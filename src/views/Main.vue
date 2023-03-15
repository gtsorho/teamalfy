<template>
  <div>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">TODO</span>
        </div>
    </nav>

    <div class="row">
        <div class="col">
              <div class="card my-4 mx-auto shadow border border-primary border-2" style="width: 30rem;">
                <div class="card-body bg-secondary">
                    <h5 class="card-title">Add Task</h5>
                </div>
                <div class="container">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="email" class=" form__input form-control-sm" required id="exampleFormControlInput1" placeholder="eg. Go to the market">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class=" form__input form-control-sm" id="exampleFormControlTextarea1" placeholder="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum dolor eaque ab magni voluptatibus enim dignissimos, nobis voluptate dolorum provident velit officiis, sequi sint impedit minus." required rows="3"></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end  m-2">   
                    <button class="px-4 btn btn-sm rounded-pill btn-primary">Add</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card my-4 mx-auto" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">Your List</h5>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Content for list item
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Content for list item
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Content for list item
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </li>
                    </ol>
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
        }
    },
    created(){
        
    },
    methods:{

        getTasks(){
            let token = this.getCookie('token')
            axios.get('http://127.0.0.1:8000/api/',
            {headers:{'Authorization': `Bearer ${token}`}})
            .then((res)=>{
                console.log(res)
            })
            .catch((err)=>{
                console.log(err)
            })
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
        }
    }
}
</script>
<style lang="scss">
        @import url('https://fonts.googleapis.com/css2?family=Raleway&display=swap');
        html,body, p, h1,h2,h4,h5,h6{
            font-family: 'Raleway', sans-serif !important;
        }
        body,html{
            background-color: #ffffff !important;  
        }
        #main {
        transition: margin-left .5s;
        padding: 22px;
        margin-left: 250px;
        }

        .btn:hover{
            background: #019d9d !important;
        }

        $primary: #008080;
        $danger:#ff4064;
        $secondary: rgb(238, 238, 238);

        /* width */
        ::-webkit-scrollbar {
        width: 10px;
        }

        .form__input{
            width: 100%;
            border:0px solid transparent;
            border-radius: 0 !important;
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

        /* Track */
        ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey; 
        border-radius: 10px;
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #008080; 
        border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #008080; 
        }

        .form-control:focus {
            color: #212529;
            background-color: #fff;
            border-color: #8ba6ff;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgb(23 76 254 / 0%)!important;
        }

        @import "../node_modules/bootstrap/scss/bootstrap";
</style>