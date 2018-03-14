<?php
    include_once("model/Model.php");
    class Controller {
    public $model;

    public function __construct() {
         $this->model = new Model();
    }
    public function invoke() {
    if (!isset($_GET['book'])) {
        $books = $this->model->getBookList();
        include 'view/booklist.php';  
    }
    else {
        $book = $this->model->getBook($_GET['book']);
        include 'view/viewbook.php';
        }
    
    if(isset($_POST['insert'])){
        include 'view/insertbook.php';
    }
    if(isset($_POST['save']))
        {       
            if($this->model->setBook()==1)
                echo "insert success";
            else
                echo "insert not success";
        }
    }
} 
?>