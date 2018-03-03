new Vue({
	el:"#app",

	data:{
		users:[],
		products:[],
		orders:[],
		promotions:[],
		recommendations:[]
	},

	computed:{
	},

	methods:{
		getUserOrders(user_id){
			return this.orders.filter(order=> order.user_id = user_id);
		},
		getUserRecommendations(user_id){
			return this.recommendations.filter(recommend=> recommend.user_id = user_id);
		},
		getPromotion(user_id,product_id){
			return this.promotions.filter(promote=> [promote.product_id = product_id, promote.user_id = user_id]);
		},
		recommend(){
			$("#preloader").modal("show");

			function recommend(){
				return axios.get("/api/recommend");
			}

			function getPromotions(){
				return axios.get("/api/promotions/index")
			}

			axios.all([recommend(), getPromotions()])
			.then(response=> 	[
									this.recommendations = response[0].data,
									this.promotions = response[1].data,
									$("#preloader").modal("hide")
								]
			);
		},
		addProduct(id){
			$("#preloader").modal("show");
			var product_id = $("#select_"+id+" option:selected").attr("data-id");

			if(typeof product_id != "undefined"){

				function createOrder(user_id,product_id){
					return axios.post('/api/orders/createOrder', {
						user_id: user_id,
						product_id: product_id
					});
				}
				function getOrders(){
					return axios.get('/api/orders/full')
				}

				axios.all([createOrder(id,product_id),getOrders()])
				.then(response=> 	[	
						this.orders = response[1].data,
						$("#preloader").modal("hide")
					]);

			}else{
				alert("Please Select a product to add");
			}
		}
	},

	created(){
		$("#preloader").modal("show");

		function getusers(){
			return axios.get('/api/users/index');
		}

		function getProducts(){
			return axios.get('/api/products/index');
		}

		function getOrders(){
			return axios.get('/api/orders/full')
		}

		axios.all([getusers(), getProducts(),getOrders()])
		.then(response=> 	[	
								this.users = response[0].data,
								this.products = response[1].data,
								this.orders = response[2].data,
								$("#preloader").modal("hide")
							]);
	}
});
