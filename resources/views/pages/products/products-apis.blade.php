@extends("master")
@section("css")
@endsection
@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <pre><h5 style="margin-bottom: 0;">Important Information</h5><br><b>Optional parameters:</b><br>1. {"type" : "with-sub"}, {"type" : "with-sub-and-products"} means fetch parent categories with sub categories.<br>2. {"take" : 10} means you want to fetch just 10 parent categories.<br><br><b>Order by:</b><br>3. {"order" : "column_name", "dir" : "DESC"} means fetch parent categories with order against its any column. Also you can use "ASC" or "DESC" for "dir".<br>4. {"order_sub_cats" : "sub_cate_column_name", "sub_cate_dir" : "DESC"} means fetch sub categories with order against its any column. Also you can use "ASC" or "DESC" for "sub_cate_dir".<br>5. {"order_products" : "products_column_name", "products_dir" : "DESC"} means fetch products with order against its any column. Also you can use "ASC" or "DESC" for "products_dir".<br></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Parent Categories</h6>
                <small>Fetch parent categories, its categories and related products</small>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 200px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/parent-categories' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--data ''</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 400px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "parent_categories": [</span><br><span>        {</span><br><span>            "id": 3,</span><br><span>            "title": "Phones",</span><br><span>            "slug": "phones",</span><br><span>            "status": "published",</span><br><span>            "created_at": "2023-03-29T20:41:59.000000Z",</span><br><span>            "updated_at": "2023-03-29T20:50:03.000000Z",</span><br><span>            "categories": [</span><br><span>                {</span><br><span>                    "id": 4,</span><br><span>                    "category_id": 3,</span><br><span>                    "title": "Apply",</span><br><span>                    "slug": "apply",</span><br><span>                    "status": "published",</span><br><span>                    "created_at": "2023-03-29T21:27:32.000000Z",</span><br><span>                    "updated_at": "2023-03-29T21:27:32.000000Z",</span><br><span>                    "products": [</span><br><span>                        {</span><br><span>                            "id": 2,</span><br><span>                            "sub_category_id": 4,</span><br><span>                            "section_id": 2,</span><br><span>                            "title": "Iphone X",</span><br><span>                            "slug": "iphone-x",</span><br><span>                            "amount": "12.50",</span><br><span>                            "discount": "2.00",</span><br><span>                            "colors": "#fff700",</span><br><span>                            "recommendation": 0,</span><br><span>                            "description": "Iphone X sale",</span><br><span>                            "created_at": "2023-04-01T15:06:29.000000Z",</span><br><span>                            "updated_at": "2023-04-01T20:13:11.000000Z",</span><br><span>                            "status": "published",</span><br><span>                            "links": [</span><br><span>                                {</span><br><span>                                    "id": 3,</span><br><span>                                    "product_id": 7,</span><br><span>                                    "links": "https://chat.openai.com/",</span><br><span>                                    "created_at": "2023-04-01T19:20:41.000000Z",</span><br><span>                                    "updated_at": "2023-04-01T19:20:41.000000Z"</span><br><span>                                }</span><br><span>                            ],</span><br><span>                            "images": [</span><br><span>                                {</span><br><span>                                    "id": 12,</span><br><span>                                    "product_id": 12,</span><br><span>                                    "name": "IphoneX.jpg",</span><br><span>                                    "image": "6428932bd8e4f.jpg",</span><br><span>                                    "type": "other",</span><br><span>                                    "created_at": null,</span><br><span>                                    "updated_at": null</span><br><span>                                }</span><br><span>                            ]</span><br><span>                        }</span><br><span>                    ]</span><br><span>                }</span><br><span>            ]</span><br><span>        }</span><br><span>    ],</span><br><span>    "product_image_base_path": "{{url("/")}}/storage/app/product_images"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Parent Categories with Products</h6>
                <small>Fetch parent categories and related products</small>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 200px;" tabindex="0"><code class="language-markup"><span>curl --location --request GET '{{url("/")}}/api/parent-categories-with-products' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data ''</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 400px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "parent_categories": [</span><br><span>        {</span><br><span>            "id": 3,</span><br><span>            "title": "Et eos et ea error e",</span><br><span>            "slug": "sint-aliquip-incidi",</span><br><span>            "status": "published",</span><br><span>            "created_at": "2023-03-29T20:41:59.000000Z",</span><br><span>            "updated_at": "2023-03-29T20:50:03.000000Z",</span><br><span>            "type": null,</span><br><span>            "products": [</span><br><span>                {</span><br><span>                    "id": 2,</span><br><span>                    "sub_category_id": 4,</span><br><span>                    "section_id": 2,</span><br><span>                    "title": "Qui labore qui incid",</span><br><span>                    "slug": "itaque-ut-est-nihil",</span><br><span>                    "amount": "12.50",</span><br><span>                    "discount": "2.00",</span><br><span>                    "colors": "#fff700",</span><br><span>                    "recommendation": 0,</span><br><span>                    "description": "<p>Et ratione soluta do</p>",</span><br><span>                    "created_at": "2023-04-01T15:06:29.000000Z",</span><br><span>                    "updated_at": "2023-04-01T20:13:11.000000Z",</span><br><span>                    "status": "published",</span><br><span>                    "type": null</span><br><span>                }</span><br><span>            ]</span><br><span>        }</span><br><span>    ],</span><br><span>    "product_image_base_path": "{{url("/")}}/storage/app/product_images"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Products by Section</h6>
                <small>Fetch products by section name</small>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 200px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/section-wise-products' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data '{</span><br><span>    "section_name" : "Trends"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 400px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "products": [</span><br><span>        {</span><br><span>            "id": 14,</span><br><span>            "sub_category_id": 1,</span><br><span>            "section_id": 2,</span><br><span>            "title": "Iphone X",</span><br><span>            "slug": "iphone-x",</span><br><span>            "amount": "22.00",</span><br><span>            "discount": "0.00",</span><br><span>            "colors": "",</span><br><span>            "recommendation": 0,</span><br><span>            "description": null,</span><br><span>            "created_at": "2023-04-01T20:34:00.000000Z",</span><br><span>            "updated_at": "2023-04-01T20:34:00.000000Z",</span><br><span>            "status": "published",</span><br><span>            "links": [</span><br><span>                {</span><br><span>                    "id": 4,</span><br><span>                    "product_id": 14,</span><br><span>                    "links": "https://chat.openai.com/",</span><br><span>                    "created_at": null,</span><br><span>                    "updated_at": "2023-04-01T23:19:47.000000Z"</span><br><span>                }</span><br><span>            ],</span><br><span>            "images": [</span><br><span>                {</span><br><span>                    "id": 14,</span><br><span>                    "product_id": 14,</span><br><span>                    "name": "creepy-dark-fear-grave-534590.jpg",</span><br><span>                    "image": "64289538375a7.jpg",</span><br><span>                    "type": "other",</span><br><span>                    "created_at": null,</span><br><span>                    "updated_at": null</span><br><span>                }</span><br><span>            ]</span><br><span>        }</span><br><span>    ],</span><br><span>    "product_image_base_path": "{{url("/")}}/storage/app/product_images"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Products by Parent Category</h6>
                <small>Fetch products by parent category slug</small>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 200px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/parent-category-wise-products' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data '{</span><br><span>    "slug" : "Phones"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 400px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "products": [</span><br><span>        {</span><br><span>            "id": 14,</span><br><span>            "sub_category_id": 1,</span><br><span>            "section_id": 2,</span><br><span>            "title": "Iphone X",</span><br><span>            "slug": "iphone-x",</span><br><span>            "amount": "22.00",</span><br><span>            "discount": "0.00",</span><br><span>            "colors": "",</span><br><span>            "recommendation": 0,</span><br><span>            "description": null,</span><br><span>            "created_at": "2023-04-01T20:34:00.000000Z",</span><br><span>            "updated_at": "2023-04-01T20:34:00.000000Z",</span><br><span>            "status": "published",</span><br><span>            "links": [</span><br><span>                {</span><br><span>                    "id": 4,</span><br><span>                    "product_id": 14,</span><br><span>                    "links": "https://chat.openai.com/",</span><br><span>                    "created_at": null,</span><br><span>                    "updated_at": "2023-04-01T23:19:47.000000Z"</span><br><span>                }</span><br><span>            ],</span><br><span>            "images": [</span><br><span>                {</span><br><span>                    "id": 14,</span><br><span>                    "product_id": 14,</span><br><span>                    "name": "creepy-dark-fear-grave-534590.jpg",</span><br><span>                    "image": "64289538375a7.jpg",</span><br><span>                    "type": "other",</span><br><span>                    "created_at": null,</span><br><span>                    "updated_at": null</span><br><span>                }</span><br><span>            ]</span><br><span>        }</span><br><span>    ],</span><br><span>    "product_image_base_path": "{{url("/")}}/storage/app/product_images"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Products by Category</h6>
                <small>Fetch products by category slug</small>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 200px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/category-wise-products' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data '{</span><br><span>    "slug" : "iphone"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 400px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "products": [</span><br><span>        {</span><br><span>            "id": 14,</span><br><span>            "sub_category_id": 1,</span><br><span>            "section_id": 2,</span><br><span>            "title": "Iphone X",</span><br><span>            "slug": "iphone-x",</span><br><span>            "amount": "22.00",</span><br><span>            "discount": "0.00",</span><br><span>            "colors": "",</span><br><span>            "recommendation": 0,</span><br><span>            "description": null,</span><br><span>            "created_at": "2023-04-01T20:34:00.000000Z",</span><br><span>            "updated_at": "2023-04-01T20:34:00.000000Z",</span><br><span>            "status": "published",</span><br><span>            "links": [</span><br><span>                {</span><br><span>                    "id": 4,</span><br><span>                    "product_id": 14,</span><br><span>                    "links": "https://chat.openai.com/",</span><br><span>                    "created_at": null,</span><br><span>                    "updated_at": "2023-04-01T23:19:47.000000Z"</span><br><span>                }</span><br><span>            ],</span><br><span>            "images": [</span><br><span>                {</span><br><span>                    "id": 14,</span><br><span>                    "product_id": 14,</span><br><span>                    "name": "creepy-dark-fear-grave-534590.jpg",</span><br><span>                    "image": "64289538375a7.jpg",</span><br><span>                    "type": "other",</span><br><span>                    "created_at": null,</span><br><span>                    "updated_at": null</span><br><span>                }</span><br><span>            ]</span><br><span>        }</span><br><span>    ],</span><br><span>    "product_image_base_path": "{{url("/")}}/storage/app/product_images"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Product Details</h6>
                <small>Fetch product details by product slug</small>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 200px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/product-details' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data '{</span><br><span>    "slug" : "iphone-x"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 400px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "product": {</span><br><span>        "id": 14,</span><br><span>        "sub_category_id": 1,</span><br><span>        "section_id": 2,</span><br><span>        "title": "Iphone X",</span><br><span>        "slug": "iphone-x",</span><br><span>        "amount": "22.00",</span><br><span>        "discount": "0.00",</span><br><span>        "colors": "",</span><br><span>        "recommendation": 0,</span><br><span>        "description": null,</span><br><span>        "created_at": "2023-04-01T20:34:00.000000Z",</span><br><span>        "updated_at": "2023-04-01T20:34:00.000000Z",</span><br><span>        "status": "published",</span><br><span>        "links": [</span><br><span>            {</span><br><span>                "id": 4,</span><br><span>                "product_id": 14,</span><br><span>                "links": "https://chat.openai.com/",</span><br><span>                "created_at": null,</span><br><span>                "updated_at": "2023-04-01T23:19:47.000000Z"</span><br><span>            }</span><br><span>        ],</span><br><span>        "images": [</span><br><span>            {</span><br><span>                "id": 14,</span><br><span>                "product_id": 14,</span><br><span>                "name": "creepy-dark-fear-grave-534590.jpg",</span><br><span>                "image": "64289538375a7.jpg",</span><br><span>                "type": "other",</span><br><span>                "created_at": null,</span><br><span>                "updated_at": null</span><br><span>            }</span><br><span>        ]</span><br><span>    },</span><br><span>    "product_image_base_path": "{{url("/")}}/storage/app/product_images"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Product Search</h6>
                <small>This search will apply to product title, related sub category title, and parent category title.</small>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 200px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/product-search' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data '{</span><br><span>    "search" : "iphone"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 400px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "products": [</span><br><span>        {</span><br><span>            "id": 2,</span><br><span>            "sub_category_id": 4,</span><br><span>            "section_id": 2,</span><br><span>            "title": "Qui labore qui incid",</span><br><span>            "slug": "itaque-ut-est-nihil",</span><br><span>            "amount": "12.50",</span><br><span>            "discount": "2.00",</span><br><span>            "colors": "#fff700",</span><br><span>            "recommendation": 0,</span><br><span>            "description": "<p>Et ratione soluta do</p>",</span><br><span>            "created_at": "2023-04-01T15:06:29.000000Z",</span><br><span>            "updated_at": "2023-04-01T20:13:11.000000Z",</span><br><span>            "status": "published",</span><br><span>            "type": null</span><br><span>        }</span><br><span>    ],</span><br><span>    "product_image_base_path": "{{url("/")}}/storage/app/product_images"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Product By Type</h6>
                <small>Currently "simple" and "top" types exists, in future it can be increase.</small>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 200px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/products-by-type' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data '{</span><br><span>    "type" : "top"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 400px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "products": [</span><br><span>        {</span><br><span>            "id": 2,</span><br><span>            "sub_category_id": 4,</span><br><span>            "section_id": 2,</span><br><span>            "title": "Qui labore qui incid",</span><br><span>            "slug": "itaque-ut-est-nihil",</span><br><span>            "amount": "12.50",</span><br><span>            "discount": "2.00",</span><br><span>            "colors": "#fff700",</span><br><span>            "recommendation": 0,</span><br><span>            "description": "<p>Et ratione soluta do</p>",</span><br><span>            "created_at": "2023-04-01T15:06:29.000000Z",</span><br><span>            "updated_at": "2023-04-01T20:13:11.000000Z",</span><br><span>            "status": "published",</span><br><span>            "type": null</span><br><span>        }</span><br><span>    ],</span><br><span>    "product_image_base_path": "{{url("/")}}/storage/app/product_images"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Category By Type</h6>
                <small>Currently "simple" and "top" types exists, in future it can be increase.</small>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 200px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/parent-categories-by-type' \</span><br><span>--header 'X-Requested-With: XMLHttpRequest' \</span><br><span>--header 'Accept: application/json' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data '{</span><br><span>    "type" : "top"</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 400px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "categories": [</span><br><span>        {</span><br><span>            "id": 5,</span><br><span>            "title": "Sunt minus est cons",</span><br><span>            "slug": "consequuntur-blandit",</span><br><span>            "status": "published",</span><br><span>            "created_at": "2023-04-05T20:28:04.000000Z",</span><br><span>            "updated_at": "2023-04-05T20:28:08.000000Z",</span><br><span>            "type": "top"</span><br><span>        }</span><br><span>    ]</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body bg-light border-bottom border-top bg-opacity-25">
                <h6 class="text-muted mb-0">Related Products</h6>
                <small>Get all related products using current product id.</small>
            </div>
            <div class="card-body">
                <pre class="language-markup" style="height: 200px;" tabindex="0"><code class="language-markup"><span>curl --location '{{url("/")}}/api/related-products' \</span><br><span>--header 'Content-Type: application/json' \</span><br><span>--data '{</span><br><span>    "id" : 17</span><br><span>}'</span><br></code></pre>
            </div>
            <div class="card-footer">
                <pre class="language-markup" style="height: 400px; background-color: black !important; color: white !important;" tabindex="0"><code style="color: rgba(255, 255, 255, 0.794) !important;" class="language-markup"><span>{</span><br><span>    "response": "success",</span><br><span>    "related_products": [</span><br><span>        {</span><br><span>            "id": 7,</span><br><span>            "sub_category_id": 4,</span><br><span>            "section_id": 2,</span><br><span>            "title": "Fugit minus ut vel",</span><br><span>            "slug": "modi-cupidatat-repel",</span><br><span>            "amount": "5.00",</span><br><span>            "discount": "0.00",</span><br><span>            "colors": "#000000",</span><br><span>            "recommendation": 0,</span><br><span>            "description": null,</span><br><span>            "created_at": "2023-04-01T19:14:04.000000Z",</span><br><span>            "updated_at": "2023-04-01T19:14:04.000000Z",</span><br><span>            "status": "published",</span><br><span>            "type": null</span><br><span>        }</span><br><span>    ],</span><br><span>    "product_image_base_path": "{{url("/")}}/storage/app/product_images"</span><br><span>}</span><br></code></pre>
            </div>
        </div>
    </div>
</div>
@endsection
@section("js")
@endsection
