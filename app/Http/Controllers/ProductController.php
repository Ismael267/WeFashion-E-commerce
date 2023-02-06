<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\State;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Visibility;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(6);
        // $images_paths = Product::pluck('image')->all();
        // $images = [];

        // foreach ($images_paths as $path) {
        //     $image = file_get_contents($path);
        //     array_push($images, $image);
        // }

        // dd($images);

        // dd($image);


        $compteur = Product::count();


        return view('products.index', compact('products', 'compteur'));
    }
    public function femmes()
    {
        $femmes = Product::whereHas('categorie', function ($query) {
            $query->where('categorie_name', 'femme');
        })->paginate(6);
        $compteur = $femmes->total();
        // dd($compteur);

        // dd($femmes);
        return view('products.femmes', compact('femmes', 'compteur'));
    }
    public function hommes()
    {
        $hommes = Product::whereHas('categorie', function ($query) {
            $query->where('categorie_name', 'homme');
        })->paginate(6);
        $compteur = $hommes->total();
        // dd($compteur);
        // dd($femmes);
        return view('products.hommes', compact('hommes', 'compteur'));
    }
    public function soldes()
    {
        $soldes = Product::whereHas('states', function ($query) {
            $query->where('state', 'en solde');
        })->paginate(6);
        $compteur = $soldes->total();
        // dd($compteur);
        // dd($femmes);
        return view('products.soldes', compact('soldes', 'compteur'));
    }
    public function AllAdmin()
    {
        //
        $products = Product::paginate(15);
        $compteur = Product::count();
        return view('admins.index', compact('products', 'compteur'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //

        $request->validate([
            'title' => 'required|string|max:255',
            'reference' => 'required|string|max:16',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'categorie_name' => 'required',
            'state' => 'required',
            'visibility' => 'required',
            'size' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'

        ]);

        $product = new Product();
        $product->title = $request->input('title');
        $product->reference = $request->input('reference');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        $size = Size::where('size', $request->input('size'))->first();
        $product->size_id = $size->id;
        $categorie = Categorie::where('categorie_name', $request->input('categorie_name'))->first();
        $product->categorie_id = $categorie->id;
        $state = State::where('state', $request->input('state'))->first();
        $product->states_id = $state->id;
        $visibility = Visibility::where('visibility', $request->input('visibility'))->first();
        $product->visibility_id = $visibility->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name =Str::uuid()->toString() . "." . $image->getClientOriginalExtension();
            $destinationPath = public_path('storage/images');
            $image->move($destinationPath, $name);
            $product->image ="storage/images/". $name;
        }
        $product->save();

        return redirect()->back()->with('success', 'Le produit a été créé avec succès!');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('admins.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
        $image = $request->file('image');

        $filename = Str::uuid()->toString() . "." . $image->getClientOriginalExtension();

        $image->move(storage_path('App/public/img'), $filename);
        $categorie_id = Categorie::where('categorie_name', $request->categorie_name)->first()->id;
        $size_id = Size::where('size', $request->size)->first()->id;
        $visibility_id = Visibility::where('visibility', $request->visibility)->first()->id;
        $state_id = State::where('state', $request->state)->first()->id;

        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
            'size_id' => $size_id,
            'state_id' => $state_id,
            'categorie_id' => $categorie_id,
            'visibility_id' => $visibility_id,
            "reference" => $request->reference
        ]);

        return redirect()->back()
            ->with('success', 'modification effectué');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        //permet de supprimer un produit specifique de la base de donnée
        return redirect()->back()
            ->with('success');
    }
}
