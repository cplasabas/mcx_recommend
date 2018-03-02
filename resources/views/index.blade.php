<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MCX</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

       <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet"> 

        <style>
        body{
            background-color: #cccccc;
            font-family: 'Open Sans', sans-serif;
            font-size: 11px;
            color: #606060;
        }

        .list-head{
            font-size: 13px;
        }

        .row{
            margin: 10px 10px 10px 10px !important;
        }

        .recommend-container{
            margin: 30px 10px 30px 10px !important;
        }

        .list-container{
            flex: 1 1 0;
            height:250px;
            min-height:300px;
            display: flex;
            flex-direction: column;
            overflow-y: scroll;
        }

        .dropdown-item{
            font-size: 12px !important;
            font-family: 'Open Sans', sans-serif !important;
        }

        </style>
    </head>
    <body>
        <div class="containter-fluid">
            <div class="row">
                @foreach ($users as $u)
                    <div class="col-md-4">

                        <div class="row promotions text-center" >
                            <p class="user-text col-md-12"  style="font-size:20px;">{{$u->fname}} {{$u->lname}}</p>
                        </div>

                        <div class="row actions text-center ">
                            <form class="col-md-12">
                                <div class="dropdown " style="margin: 5px 5px 20px 5px;">
                                    <button class="btn btn-secondary dropdown-toggle btn-lg btn-block" style="font-size:12px;" type="button" data-toggle="dropdown">Products</button>
                                    <div class="dropdown-menu">
                                         @foreach ($products as $p)
                                            <a class="dropdown-item" data-id="{{$p->id}}">{{$p->name}}</a>
                                         @endforeach
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default btn-lg btn-block" style=" font-size:12px">Add</button>
                            </form>
                        </div>

                        <div class="row orders">
                            <ul class="list-group col-md-12 list-container">
                                <li class="list-group-item list-head text-center">ORDERS</li>
                                @foreach ($orders as $o)
                                    @if ($u->id == $o->user_id)
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-10">
                                                     {{$o->name}}
                                                </div>
                                                <div class="col-md-2">
                                                     x{{$o->count}}
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="row promotions">
                                <ul class="list-group col-md-12 list-container">
                                  <li class="list-group-item list-head text-center">PROMOTIONS</li>
                                  <li class="list-group-item">Promotion 1</li>
                                  <li class="list-group-item">Promotion 2</li>
                                  <li class="list-group-item">Promotion 3</li>
                                  <li class="list-group-item">Promotion 4</li>
                                  <li class="list-group-item">Promotion 5</li>
                              </ul>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        <div class="containter-fluid recommend-container">
            <div class="row center-block">
                <div class="col-md-8 offset-md-2 text-center">
                    <form action="recommend">
                        <button type="submit" class="btn btn-success btn-lg btn-block" style=" font-size:12px">RECOMMEND</button>
                    </form>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
