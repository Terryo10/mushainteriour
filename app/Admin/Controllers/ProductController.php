<?php

namespace App\Admin\Controllers;

use App\product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\category;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new product());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('imagePath', __('ImagePath'))->image();
        $grid->column('price', __('Price'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('description', __('Description'));
        $grid->column('display', __('Display'))->display(function($display){
            return $display == 1 ? 'Yes' : 'No';
        });

        $grid->column('category_id', __('Category'))->display(function($category_id){
            $category = category::find($category_id);
            return $category->name;
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
        $show = new Show(product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('imagePath', __('ImagePath'))->image();
        $show->field('price', __('Price'));
        $show->field('quantity', __('Quantity'));
        $show->field('description', __('Description'));
        $show->field('display', __('Display'));
        $show->field('user_id', __('User id'));
        $show->field('category_id', __('Category id'));
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
        $form = new Form(new product());

        $form->text('name', __('Name'));
        $form->image('imagePath', __('ImagePath'));
        $form->decimal('price', __('Price'));
        $form->number('quantity', __('Quantity'));
        $form->textarea('description', __('Description'));
        $form->switch('display', __('Display'))->default(1);
        $form->hidden('user_id', __('User id'))->value(1);
        $form->select('category_id', __('Category'))->options(Category::all()->pluck('name', 'id'))->required();

        return $form;
    }
}
