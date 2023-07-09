@extends('layouts.front')
@section('content')
    <style>
        .color-row1,
        .color-row2 {
            margin: 15px;
            padding: 0;
            max-width: 220px;
        }

        .color-circle {
            max-width: 220px;
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50px 50px 50px 50px;

        }

        .size-circle {
            background-color: #EBEBEB;

        }

        .sizedouble {

            margin: 5px 5px;

        }

        .size {
            margin: 6px 8px;
        }

        /*ITEMS!!!*/


        .items {
            width: 650px;
            margin: 5px;
            display: inline-block;
        }

        .item {
            vertical-align: top;
            width: 190px;
            height: 300px;
            margin: 8px;
            background: #FEFEFE;
            display: inline-block;
            border-radius: 3px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.06);
        }

        h3 {
            text-align: center;
            margin-bottom: 5px;
            margin-left: 5px;
            margin-right: 5px;
            font-size: 1em;
        }

        h5 {
            position: relative;
            bottom: 10px;
            text-align: center;
            margin-top: 20px;
        }

        .descroption {
            margin: 0;
            text-align: center;
            font-size: 11px;
            font-style: italic;
            color: grey;
            font-family: sans-serif;
        }


        /*BTN*/
        .loadmore {
            height: 30px;
            width: 610px;
            margin-top: 25px;
            position: relative;
            left: 8px;
            text-decoration: none;
            font-size: 15px;
            background-color: #B8C6C7;
            color: #FEFEFE;
            border-radius: 4px;
            border: none;
            font-family: 'Roboto', sans-serif;
        }

        .mini-menu {
            width: 200px;
            border-radius: 3px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #848C8F;
            font-size: 11px;
            margin: 10px;
        }

        .mini-menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            text-align: left;
        }

        .mini-menu>ul>li {
            position: relative;
        }

        .mini-menu>ul>li>a {
            display: block;
            outline: 0;
            padding: 1.2em 1em;
            text-decoration: none;
            color: #3C3D41;
            font-weight: normal;
            letter-spacing: 2px;
            background: #FEFEFE;
            border-bottom: 1.5px solid #EAEAEA;

        }

        .mini-menu .sub>ul {
            height: 0;
            overflow: hidden;
            background: #848C8F;
        }

        .mini-menu .sub>ul>li>a {
            font-family: sans-serif;
            color: #FEFEFE;
            font-size: 12px;
            display: block;
            text-decoration: none;
            padding: .7em 1em;
            text-transform: capitalize;
            font-style: normal;
            letter-spacing: 1px;
        }

        /*.mini-menu .sub > ul > li > a:hover,*/
        .mini-menu .sub>a.active,
            {
            padding-left: 1.3em;
            color: blue;
            content: "1";
            float: right;
            margin-right: 6px;
            line-height: 12px;
        }

        .mini-menu .sub>a:after {
            content: "»";
            float: right;
            margin-right: 6px;
            line-height: 12px;
        }

        @media screen and (max-width: 940px) {
            .items {
                width: 420px;
            }

            .wrap {
                width: 700px;
            }

            .loadmore {
                width: 420px;
            }
        }

        @media screen and (max-width: 720px) {
            .items {
                width: 220px;
            }

            .wrap {
                width: 500px;
            }

            .loadmore {
                width: 220px;
            }
        }


        .ui-slider .ui-slider-handle {
            position: absolute;
            z-index: 2;
            width: 0.9em;
            height: 1.6em;
            cursor: default;
            outline: none;
            border: 1px solid rgb(207, 207, 207);
            background: #090;
            border-image: initial;
        }
    </style>
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="pops">
                    <div class="mini-menu">
                        <ul>
                            <li class="sub">
                                <a href="/shop">All Products</a>
                            </li>
                            @foreach ($categories as $cat)
                                <li class="sub">
                                    <a href="/category/{{ $cat->id }}"> {{ $cat->name }}</a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>

            <div class="items">

                <div class="items">
                    @foreach ($products as $prod)
					<a href="/product/{{$prod->id}}">
                        <div data-price="290" class="item">
						<br>
                            <center> <img src="/upload/{{ $prod->imagePath }}" alt="jacket" class="img-item"
                                    style="height:200px;">
                            </center>

                            <div class="info">
                                <h3>{{ $prod->name }}</h3>
                                <h5>${{ $prod->price }}</h5>
                            </div>
							
                        </div>
					</a>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
