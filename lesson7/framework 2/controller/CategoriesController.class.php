<?php
class CategoriesController extends Controller
{

    public $view = 'categories';

    public function index($data)
    {
        $categories = Category::getCategories(isset($data['id']) ? $data['id'] : 0);
        $goods = Good::getGoods(isset($data['id']) ? $data['id'] : 0);
        return ['subcategories' => $categories, 'goods' => $goods];
    }

    public function goods($data){
        if($data['id'] > 0){
            $good = new Good([
                "id_good" => $data['id']
            ]);

            return $good->getGoodInfo()[0];
        }
        else{
            header("Location: /categories/");
        }


    }
}
?>