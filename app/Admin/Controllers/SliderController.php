<?php

namespace App\Admin\Controllers;

use App\sliderImages;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SliderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'sliderImages';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new sliderImages());

        $grid->column('id', __('Id'));
        $grid->column('imagePath', __('ImagePath'))->image();
        $grid->column('title', __('Title'));
        $grid->column('title2', __('Title2'));
        $grid->column('title3', __('Title3'));
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
        $show = new Show(sliderImages::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('imagePath', __('ImagePath'))->image();
        $show->field('title', __('Title'));
        $show->field('title2', __('Title2'));
        $show->field('title3', __('Title3'));
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
        $form = new Form(new sliderImages());

        $form->image('imagePath', __('ImagePath'))->required();
        $form->text('title', __('Title'))->required();
        $form->text('title2', __('Title2'))->required();
        $form->text('title3', __('Title3'))->required();

        return $form;
    }
}
