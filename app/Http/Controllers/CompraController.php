<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Exception;

class CompraController extends Controller
{

    public function main()
    {
        /*Recuerda el estado de la compra y redirige a la pantalla en la que el usuario estaba antes: resumen, envio o confirmar */
        return redirect(session()->get('status', '/compra/resumen'));
    }
    /**
     * Method to show the resume of the products in the chart
     */
    public function resumen()
    {
        //Dummy: hay que cambiar la info por la información guardada en el carrito (session)
        $products = session()->get('carrito', []);
        return view('compra/resumen')
            ->with('products', $products);
    }

    /**
     * Method to show and process the shipping form (envio)
     */
    public function envio()
    {
        session()->put('status', 'compra/envio');
        $userID = session()->get('user');
        $user = User::where('id', $userID)->get();
        return view('compra/envio')->with('user', $user[0]);
    }
    /**
     * Method to show and process the shipping form (envio)
     */
    public function verificarEnvio(UserRequest $request)
    {
        $request->flash();
        $formOK = false;
        try {
            $userShipping = (object)[];
            $path = 'public/users';
            $userShipping->name = $request->input('name');
            $userShipping->address = $request->input('address');
            $userShipping->email = $request->input('email');
            $userShipping->password = $request->input('password');
            //$file = $request->file('photo');
            //$path =  $request->file('photo')->storeAs($path, 'userphoto.jpg');
            $formOK = true;
            $request->session()->put('shipping', $userShipping);
        } catch (Exception $e) {
        }
        /*Una vez verificado se guarda la información de envio en la session*/
        //si el formulario se ha rellenado correctamente se redirecciona a la pagina de confirmación
        if ($formOK) return redirect('/compra/confirmar');
        else  return redirect('/compra/envio');
    }
    /**
     * Method to show the list of products and shipping info
     */
    public function confirmar()
    {
        //Dummy: hay que cambiar la info por la información guardada en session
        $carrito = session()->get('carrito', []);
        //Dummy: hay que cambiar la info por la información guardada en session
        $shipping =  session()->get('shipping');
        session()->put('status', 'compra/confirmar');
        return view('compra/confirmar')->with('products', $carrito)->with('shipping', $shipping);
    }
    /**
     * Metodo para borrar el carrito (session)
     */
    public function end(Request $request)
    {
        $request->session()->forget('status');
        $request->session()->forget('carrito');
        return view('compra/end');
    }
    /**
     * Metodo que comprueba que existan unidades de una pelicula
     */
    public function checkStock(Request $request)
    {
        $product = Product::stock($request->input('quantity'), $request->input('id'));
        if (empty($product)) {
            return false;
        } else {
            return $product->get();
        }
    }

    /**
     * Metodo para introducir un producto al carrito (session)
     */
    public function addToCart()
    {
        /*
        Completar el controlador para añadir los productos a la sessión
        */
        return redirect(url()->previous());
    }

    /**
     * Metodo para borrar el carrito (session)
     */
    public function clearCart()
    {
        /*
        Completar el controlador para eliminar los productos a la sessión
        */
        return redirect()->route('home');
    }
}
