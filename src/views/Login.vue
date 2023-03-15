<template lang="">


	<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh!important;">
		<div class="row main-content bg-success text-center shadow-lg">
			<div class="col-md-4 text-center company__info">
				<h2 class="company_title">TODO</h2>
				<h4 class="company_title">Concept</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row mt-3">
						<h4>Log In</h4>
					</div>
					<div class="row" >
						<form control="" class="form-group" v-if="!register">
							<div class="row">
								<input type="text" v-model="creds.username" name="username" id="username" class="form__input form-control-sm" placeholder="Username">
							</div>
							<div class="row">
								<input type="password" v-model="creds.password" name="password" id="password" class="form__input form-control-sm" placeholder="Password">
							</div>
							<div class="row">
								<input type="button" value="Submit" @click="login" class="btn btn-sm mx-auto">
							</div>
							<span>I dont have an account <a href="#" @click="register = true" >register</a> </span>
						</form>
						<form control="" class="form-group" v-else>
							<div class="row">
								<label for=""  class='text-start'>Username</label>
								<input  type="text" v-model="creds.username" name="username" id="username" class="form__input py-0 form-control-sm" placeholder="Username">
							</div>
							<div class="row">
								<label for="" class='text-start'>Password</label>
								<input  type="password" v-model="creds.password" name="password" id="password" class="form__input py-0 form-control-sm" placeholder="Password">
							</div>
							<div class="row">
								<label for="" class='text-start'>Confirm Password</label>
								<input  type="password" v-model="creds.password_confirmation" name="password" id="password" class="form__input py-0 form-control-sm" placeholder="Password">
							</div>
							<div class="row">
								<input type="button" value="Submit" @click="registerFx" class="btn btn-sm mx-auto">
							</div>
							<span>I already have an account <a href="#" @click="register = false" >register</a> </span>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
			register: false,
            creds:{
                username:'',
                password:'',
				password_confirmation:''
            }
        }
    },
    methods:{
        login(){
            axios.post('http://127.0.0.1:8000/api/login', this.creds
            )
            .then((response) => {
                this.setCookie('token', response.data)
                this.$router.push({name: 'main'})
            })
            .catch((error) => {
                console.log(error);
            });
        },
		registerFx(){
            axios.post('http://127.0.0.1:8000/api/register', this.creds
            )
            .then((response) => {
                this.setCookie('token', response.data)
                this.$router.push({name: 'main'})
            })
            .catch((error) => {
                console.log(error);
            });
        },
        getCookie(cname){
          let name = cname + "=";
          let ca = document.cookie.split(';');
          for(let i = 0; i < ca.length; i++) {
              let c = ca[i];
              while (c.charAt(0) == ' ') {
              c = c.substring(1);
              }
              if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
              }
          }
          return "";
        },
        setCookie(cname, cvalue, exdays) {
          const d = new Date();
          d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
          let expires = "expires=" + d.toUTCString();
          document.cookie = cname + "=" + cvalue + ";"+ expires + ";path=/";
        },
    },
}
</script>
<style scoped>
.main-content{
	width: 40%;
	border-radius: 20px;
	margin: 5em auto;
	display: flex;
}
.company__info{
	background-color: #008080;
	border-top-left-radius: 20px;
	border-bottom-left-radius: 20px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	color: #fff;
}
.fa-android{
	font-size:3em;
}
@media screen and (max-width: 640px) {
	.main-content{width: 90%;}
	.company__info{
		display: none;
	}
	.login_form{
		border-top-left-radius:20px;
		border-bottom-left-radius:20px;
	}
}
@media screen and (min-width: 642px) and (max-width:800px){
	.main-content{width: 70%;}
}
.row > h4{
	color:#008080;
}
.login_form{
	background-color: #fff;
	border-top-right-radius:20px;
	border-bottom-right-radius:20px;
	border-top:1px solid #ccc;
	border-right:1px solid #ccc;
}
form{
	padding: 0 2em;
}
.form__input{
	width: 100%;
	border:0px solid transparent;
	border-radius: 0;
	border-bottom: 1px solid #aaa;
	padding: 1em .5em .5em;
	padding-left: 2em;
	outline:none;
	margin:.5em auto;
	transition: all .5s ease;
}
.form__input:focus{
	border-bottom-color: #008080;
	box-shadow: 0 0 5px rgba(0,80,80,.4); 
	border-radius: 4px;
}
.btn{
	transition: all .5s ease;
	width: 70%;
	border-radius: 30px;
	color:#008080;
	font-weight: 600;
	background-color: #fff;
	border: 1px solid #008080;
	margin-top: 1.5em;
	margin-bottom: 1em;
}
.btn:hover, .btn:focus{
	background-color: #008080;
	color:#fff;
}
</style>