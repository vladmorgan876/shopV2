<template>
    <div class="formorder container">
        <div style="margin-top: 5em;color: white">Вы хотите оформить заказ на :</div>
        <table style="margin-top: 2em" class="table table-striped table-hover table-bordered table-success">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Категория</th>
                <th scope="col">Количество</th>
                <th scope="col">Сумма</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="el in this.finalorder">
                <td>{{el.name}}</td>
                <td>{{el.category}}</td>
                <td>{{el.defaultINcart}}</td>
                <td>{{el.defaultINcart*el.price}}</td>
            </tr>

            </tbody>
        </table>

        <div><h5 style="color: white">Общая сумма заказа : {{ this.finalprice}} гривен</h5></div>
        <div ><router-link style="color: white" class="nav-link" to="/cart">Вы можете вернуться в корзину и откорректировать заказ</router-link></div>
        <div class="card-body">
            <form @submit.prevent="order1">
                <div class="form-group row">
                    <label style="color: white" for="email" class="col-md-4 col-form-label text-md-right">E-Mail Адрес</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" v-model="email">
                    </div>
                </div>
                <div style="text-align: center; " class="alert alert-danger" v-if="errors2===true">
                    Введите адрес вашей электронной почты
                </div>
                <div class="form-group row">
                    <label style="color: white" for="username" class="col-md-4 col-form-label text-md-right">Имя</label>
                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control" name="username" v-model="username">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                           Отправить заказ
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "FormOrderComponent",
    data() {
        return {
           finalorder:[],
            finalprice:'',
            email: '',
            username: '',
            errors2:false,
        }
    },
    methods:{
        order1() {

             if (this.email.length===0){
                this.errors2=true;
            }
            else {
                for(let i=0;i<this.finalorder.length;i++){
                        axios.post('order',{name:this.username,email:this.email,productname:this.finalorder[i].name,productprice:
                            this.finalorder[i].price,productquantity:this.finalorder[i].defaultINcart,category:this.finalorder[i].category
                        })
                            .then((response) => {
                                debugger;
                                    this.message = response.data.message;
                                    if (this.message=="New order is created"){
                                        alert("заказ на :"+" "+this.finalorder[i].name+" принят");
                                        window.location.href = "/";
                                    }
                                }
                            )
                }
                }
            }
        },
    mounted() {
        // выберает уникальное значение из массива (без повторов)
        this.finalorder = [...new Set(this.$store.state.finalOrder.map(a => a))];
        this.finalprice=this.$store.state.total[1];
    },
    computed:{

    },
}
</script>

<style scoped>
.formorder{
    background-image: url("/storage/newimage/fon2.jpg");
    background-size: 100%;
    margin-top: 3em;
}
</style>
