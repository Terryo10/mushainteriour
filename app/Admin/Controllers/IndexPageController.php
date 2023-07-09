<?php

namespace App\Admin\Controllers;

use App\IndexPageComponents;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class IndexPageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'IndexPageComponents';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new IndexPageComponents());

        $grid->column('id', __('Id'));
        $grid->column('heading_grey', __('Heading grey'));
        $grid->column('heading_dark', __('Heading dark'));
        $grid->column('body', __('Body'));
        $grid->column('image_path', __('Image path'))->image();
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
        $show = new Show(IndexPageComponents::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('heading_grey', __('Heading grey'));
        $show->field('heading_dark', __('Heading dark'));
        $show->field('body', __('Body'));
        $show->field('image_path', __('Image path'))->image();
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
        $form = new Form(new IndexPageComponents());

        $form->text('heading_grey', __('Heading grey'))->required();
        $form->text('heading_dark', __('Heading dark'))->required();
        $form->textarea('body', __('Body'))->required();
        $form->image('image_path', __('Image path'))->required();

        return $form;
    }
}
