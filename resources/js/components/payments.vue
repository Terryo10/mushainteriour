<template>
  <div class="container">
    <div class="comment-form">
      <!--Payment Form-->
      <!-- <form > -->

      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
          <textarea
            type="address"
            class="darma"
            v-model="address"
            placeholder="Type your delivery address here"
            required
          ></textarea>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
          <input
            type="text"
            v-model="phone_number"
            placeholder="Enter Transaction phone number"
            required
          />
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
          <select v-model="method" class="form-control form-control-lg">
            <option value="ecocash">Ecocash</option>
            <option value="onemoney">Onemoney</option>
          </select>
        </div>

        <div v-if="response" class="alert alert-success">{{response}}</div>

        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
          <button :disabled="btn_disabled" class="theme-btn btn-style-one" @click="executeTransaction" v-if="!loading && !show_check_status">
            <span class="txt">{{btn_text}}</span>
          </button>
          <socket v-if="loading"></socket>
          <button v-if="automatic_status_update_failed" class="theme-btn btn-style-one" @click="checkStatus">
            <span class="txt">{{status_btn_text}}</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {RotateSuare2, Socket} from 'vue-loading-spinner'
export default {
  components:{
    RotateSquare2,
    Socket
  },
  data() {
    return {
      address: "",
      phone_number: "",
      method: "ecocash",
      order: {},
      response: "",
      btn_text: "Execute Transaction",
      btn_disabled: false,
      loading: false,
      show_check_status: false,
      status_btn_text: 'Check Payment Status',
      automatic_status_update_failed: false
    };
  },
  methods: {
    executeTransaction() {
    this.loading = true;
      axios.post("/make_payment", {
          phone_number: this.phone_number,
          method: this.method
        })
        .then(response => {
          console.log(response.data)
          if(response.statusCode = 500){
            this.response = "It seems we cannot reach out to the payment service provider please try again in a moment..."
          }
          if (response.data.success) {
            this.btn_disabled = true
            this.order = response.data.order;
            this.show_check_status = true
            // this.checkStatus();
            this.response = "Transaction sent for processing, please complete the transaction on your device...";
            setTimeout(() => {
              this.checkStatus()
            }, 20000);
          }
        })
        .catch(error => {
          console.log("Unexpected error occured");
        });
    },
    checkStatus() {
      axios
        .get("/payment_status?order_id=" + this.order.id)
        .then(response => {
          console.log(response.data)
            if (response.data.status == "Awaiting Delivery") {
                this.loading = false
                this.automatic_status_update_failed = true;
                this.response = "Successfully Awaiting Delivery. Please wait whilst we put our things in place. Redirecting...";
                setTimeout(() => {
                  window.location.href = "/orders/" + this.order.id;
                }, 5000);
            }
          if (response.data.success) {
            if (response.data.status != "Paid") {
              this.checkStatus();
              this.status_btn_text = "Check Again"
              this.automatic_status_update_failed = true;
            }
            else{
                this.loading = false
                this.automatic_status_update_failed = true;
                this.response = "Successfully paid. Please wait whilst we put our things in place. Redirecting...";
                setTimeout(() => {
                  window.location.href = "/orders/" + this.order.id;
                }, 5000);
            }
          }
        })
        .catch(error => {
          console.log("Unexpected error occured");
        });
    }
  }
};
</script>