<?php

class TestController extends Controller
{
    public $view = 'test';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | Тестовая страница';
    }
	
	//метод, который отправляет в представление информацию в виде переменной content_data
	function delete($data){
        $obj = new Test();
        //нужно получить данные из модели и вернуть их для отображения в представлении
		 return $obj->test();//эти данные можно использовать в представлении в виде переменной content_data
	}


}

//site.ru/index.php?path=Test/delete/10