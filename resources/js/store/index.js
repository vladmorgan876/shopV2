export default {
    // установил vuex
    //   добавил папку store
    //   добавил файл index
    //   зарегистрировал в app.js
    state: {

        cart: [],
        total: [],
        finalOrder: [],
        flagscreen:'',
    },

    getters: {

        getCartFormGetters(state){ //take parameter state

            return state.cart
        }
    },

    actions: {
        TOCART(context, product) {

            context.commit('TOCART', product)
        },
        ActionDeleteCard(context,index){
            context.commit('MutatioinDeleteCard', index)
        },
        TOTAL(context,payload) {
            context.commit('MUTTOTAL',payload)
        },
        ActionAddItemsInfinalOrder(context,payload) {
            context.commit('MutationAddItemsInfinalOrder',payload)
        },
        ActionDeleteItemsFinalOrder(context,index){
            context.commit('MutatioinDeleteItemsFinalOrder', index)
        },
        ActionFlagScreen(context,payload) {
            context.commit('MUTFlagScreen',payload)
        },
    },

    mutations: {
        TOCART(state,product) {
            if(this.state.cart.length>0){
                let analogue=false;
                for (let i=0;i<this.state.cart.length;i++){
                    if(this.state.cart[i].id===product.id){
                        analogue=true;
                        //state.finalOrder.push(product);
                    }
                }
                if (analogue===false){
                    this.state.cart.push(product)
                     state.finalOrder.push(product);
                }
            }
            else {
                state.cart.push(product);
                state.finalOrder.push(product);
            }




        },
        MutatioinDeleteCard(state,index){
            this.state.cart.splice(index,1);
            return this.state.cart;
        },
        MUTTOTAL(state,payload){
            return this.state.total=payload;
        },
        MutationAddItemsInfinalOrder(state,payload){
            state.finalOrder.push(payload)
            return this.state.finalOrder;
        },
        MutatioinDeleteItemsFinalOrder(state,index){
            this.state.finalOrder.splice(index,1);
            return this.state.finalOrder;
        },
        MUTFlagScreen(state,payload){
            this.state.flagscreen=payload;
            return this.state.flagscreen;
        }

    }
}
