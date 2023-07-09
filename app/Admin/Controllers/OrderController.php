<?php

namespace App\Admin\Controllers;

use App\orders;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'orders';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new orders());

        $grid->column('id', __('Id'));
        $grid->column('paymentStatus', __('PaymentStatus'));
        $grid->column('transaction_ref', __('Transaction ref'));
        $grid->column('delivery_id', __('Delivery id'));
        $grid->column('status', __('Status'));
        $grid->column('user_id', __('User id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(orders::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('paymentStatus', __('PaymentStatus'));
        $show->field('transaction_ref', __('Transaction ref'));
        $show->field('delivery_id', __('Delivery id'));
        $show->field('status', __('Status'));
        $show->field('user_id', __('User id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new orders());

        $form->text('paymentStatus', __('PaymentStatus'))->default('initiated');
        $form->text('transaction_ref', __('Transaction ref'));
        $form->number('delivery_id', __('Delivery id'));
        $form->text('status', __('Status'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
