<? 
class Functions 
{
    public function createAddress(){
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        $userId = 1;
        $index = $_POST['index'];
        $name = $_POST['name'];
        $address = $_POST['addr'];
    }
}