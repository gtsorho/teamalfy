<template>
    <div >
        <router-view></router-view>
    </div>
</template>
<script>


</script>
<style lang="scss">
        @import url('https://fonts.googleapis.com/css2?family=Raleway&display=swap');
        html,body, p, h1,h2,h4,h5,h6{
            font-family: 'Raleway', sans-serif !important;
        }
        body,html{
            background-color: #ffffff !important;  
        }


        $primary: #174cfe;
        $danger:#ff4064;
        $secondary: rgb(238, 238, 238);

        /* width */
        ::-webkit-scrollbar {
        width: 10px;
        height: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey; 
        border-radius: 10px;
        }
        
        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #174cfe; 
        border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #0c2b90; 
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