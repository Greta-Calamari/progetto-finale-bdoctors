<template>
            <!-- <h1>Error 404 | Page not found</h1> -->
    <div class="p-4 text-center container col-12">
		<h1>Error 404 | Page not found</h1>
        <div @mouseover="mouseOver()" class="loupe">
    
        </div>
    </div> 
</template>
<script>

            
        

export default ({
    name:'NotFoundComponent',
		data(){
			return{

				
			}
    	},
		computed:{
			mouseOver(){
				var loupe;
				loupe = document.querySelector('.loupe');
				document.addEventListener('mousemove', function(ev) {
				  loupe.style.top = (ev.clientY - 65) + 'px';
				  return loupe.style.left = (ev.clientX - 65) + 'px';
				});
			}
		
		},

	
		
		
	
})
</script>
<style lang="scss" scoped>
	.container{
		position: absolute;
		top: 0;
		right: 0;
		height: 100vh;
		width: 100vw;
		z-index: 10000000;
		background-color: #ffffff;
		background-image: url("https://www.asrt.org/images/default-source/404-page/404-x-ray.jpg");
	 background-size: 40% cover;
	 background-attachment: fixed;
	 background-repeat: no-repeat;
	 background-position: center center;

	}
	.loupe {
	 position: absolute;
	 background-color: black;
	 background-image: url("https://www.asrt.org/images/default-source/404-page/404-alt-x-ray.jpg");
	 background-size: 40% cover;
	 background-attachment: fixed;
	 background-repeat: no-repeat;
	 background-position: center center;
	 width: 120px;
	 height: 120px;
	 border-radius: 0px;
	 border: 5px solid #808080;
	 cursor: none;
	 top: 25%;
	 left: 40%;
}
h1{
	color: #053777;
}

</style>
