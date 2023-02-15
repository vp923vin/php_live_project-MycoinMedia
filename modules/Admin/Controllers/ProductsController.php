<?php
/*
*  Admin Module Add Products Controller
*/

namespace Modules\Admin\Controllers;
use CodeIgniter\Controller;
use Modules\Admin\Models\AddProductsModel;
use Modules\Users\Models\ProductsPlanModel;

class ProductsController extends Controller 
{
    public function index()
    {
        if(!session()->has('logged_in_admin')){
            return redirect()->to('/login');
        }
        $model = new ProductsPlanModel();
        $data['products'] = $model->getProducts();
        return view('../../modules/Admin/Views/dashboard/addProducts',$data);
    }

    public function productData()
    {
        if(!session()->has('logged_in_admin')){
            return redirect()->to('/login');
        }
        
        $model = new AddProductsModel();
        $data = [
            'name'        => $this->request->getVar('name'),
            'price'       => $this->request->getVar('price'),
            'currency'    => $this->request->getVar('currency'),
            'services'    => $this->request->getVar('services'),
            'validity'    => $this->request->getVar('validity'),
        ];
        $result = $model->insertProduct($data);
        
        $session = session();
        if($result){
            $session->setFlashdata("add-product", "Product added successfully");
            return redirect()->to(base_Url().'/dashboard/addProducts');

        }
    }


    public function editProducts()
    {

    $model = new ProductsPlanModel();
    $data['products'] = $model->getProducts();
    // $data2[] = $model->getSingleProductData($id);
    return view('../../modules/Admin/Views/dashboard/editDeleteProducts',$data);

    }

    public function getProducts($id)
    {  
        $model = new AddProductsModel();
        $data['products'] = $model->get_product('products',$id);
        // var_dump($data);exit;
        return view('../../modules/Admin/Views/dashboard/editProduct', $data);

    }

    public function updateProduct()
    {
        $model =new AddProductsModel();
        $id = $this->request->getVar('id');
        $data = [
            'name'         => $this->request->getVar('name'),
            'price'        => $this->request->getVar('price'),
            'currency'     => $this->request->getVar('currency'),
            'services'     => $this->request->getVar('services'),
            'validity'     => $this->request->getVar('validity')
        ];
        $result = $model->update_product($data, $id);
        
        $session = session();
        if($result)
        {
            $session->setFlashdata('edit-product', 'Product edited successfully!');
            return redirect()->to('/dashboard/products');
        }
    }

    public function deleteProducts($id)
    {
        
        $model = new AddProductsModel();
        $result = $model->delete_product($id);
        
        $session = session();
        if($result)
        {
            $session->setFlashdata('del-product', 'Product deleted successfully!');
            return redirect()->to('/dashboard/products');
        }
    }

}