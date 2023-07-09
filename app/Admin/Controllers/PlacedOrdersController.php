<?php

namespace App\Admin\Controllers;

use App\placedOrders;
use App\product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PlacedOrdersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'placedOrders';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new placedOrders());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('phone', __('Phone'));
        $grid->column('info', __('Info'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('product_id', __('Product'))->display(function($product_id){
            return product::find($product_id)->name;
        });
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
        $show = new Show(placedOrders::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('phone', __('Phone'));
        $show->field('info', __('Info'));
        $show->field('quantity', __('Quantity'));
        $show->field('product_id', __('Product '));
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
        $form = new Form(new placedOrders());

        $form->text('name', __('Name'));
        $form->mobile('phone', __('Phone'));
        $form->textarea('info', __('Info'));
        $form->number('quantity', __('Quantity'));
        $form->number('product_id', __('Product id'));

        return $form;
    }
}
