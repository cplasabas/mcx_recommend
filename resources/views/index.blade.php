<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>MCX</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet"> 
        <link href="/css/app.css" rel="stylesheet"> 
    </head>
    <body>
        <div class="containter-fluid" id="app">
            <div v-cloak class="row">
                <div v-for="user in users" class="col-md-4">
                    <div class="row promotions text-center" >
                        <p class="user-text col-md-12"  style="font-size:20px;">@{{user.fname}} @{{user.lname}}</p>
                    </div>

                    <div class="row actions text-center">
                            <div class="row col-md-12" style="margin: 5px 5px 20px 5px;">
                                <select class="form-control select_container" :id="'select_'+user.id" >
                                    <option class="drop_item active">Products</option>
                                    <option class="drop_item" v-for="product in products" :data-id="product.id">
                                        @{{product.name}}
                                    </option>
                                </select>
                            </div>
                            <button @click="addProduct(user.id)" class="btn btn-default btn-lg btn-block" style=" font-size:12px">
                                Add
                            </button>
                    </div>

                    <div class="row orders">
                        <ul class="list-group col-md-12 list-container">
                            <li class="list-group-item list-head text-center">ORDERS</li>
                            <li v-for="order in getUserOrders(user.id)" class="list-group-item">
                                <div class="row">
                                    <div class="col-md-10">
                                         @{{order.name}}
                                    </div>
                                    <div class="col-md-2">
                                         x@{{order.count}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="row promotions">
                        <ul class="list-group col-md-12 list-container">
                            <li class="list-group-item list-head text-center">PROMOTIONS</li>
                            <template v-for="recommend in getUserRecommendations(user.id)">
                                <li v-for="promote in getPromotion(user.id, recommend.product_id)"
                                    class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @{{promote.name}}
                                        </div>
                                        <div class="col-md-4">  
                                            Rating: @{{recommend.rating.toPrecision(3)}}
                                       </div>
                                   </div>
                                </li>
                            </template>
                        </ul>
                    </div>

                </div>
            </div>
        
            <div class="containter-fluid recommend-container">
                <div class="row center-block">
                    <div class="col-md-8 offset-md-2 text-center">
                        <button @click="recommend" class="btn btn-success btn-lg btn-block" style=" font-size:12px">RECOMMEND</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade preloader" id="preloader" style="margin:0 auto; z-index:1;">
            <div class="modal-dialog" role="document">
                <div class="modal-content"  style="background: none; border:0;">
                   <div class="spinner-container">
                        <div class="spinners">
                            <div class="spinner-block">
                                <div class="spinner spinner-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
