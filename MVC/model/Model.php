<?php
    include_once("model/Book.php");
    class Model {
       public $con; 
    public function __construct(){
        $this->con=mysqli_connect("localhost","root","","book");
        if(!$this->con){
            die("Connection failed:".mysql_connect_error());
        }
    }
    public function getBookList() {
        
        
        $sql="SELECT title,author,description FROM getbook";
        $res = $this->con->query($sql);
        //while(list($title,$author,$description)=$result->fetch_row()){
            //$book[$title]=new Book($title,$author,$description);
        //}
        // echo "<pre>";
        $dd = array();
        while ($row = $res->fetch_object()) { 
            $dd[$row->title] = new Book($row->title,$row->author,$row->description) ;
            // array( "title"=>$row->title, "author"=>$row->author,"description"=>$row->description );
            // print_r($dd);
        } 
        // echo"</pre>";
        
        // exit();
        return $dd;
    }
    public function getBook($title)
    {
        $allBooks = $this->getBookList();
        return $allBooks[$title];
    }
    public function setBook(){
        $title=$_POST['title'];
        $author=$_POST['author'];
        $description=$_POST['description'];
        $sql="INSERT INTO getbook (title,author,description)VALUE('$title',$author,'$description')";
        if($this->con->query($sql)==TRUE)
            return 1;
        else    
            return 0;
    }

}
?>