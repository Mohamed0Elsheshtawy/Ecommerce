import { defineStore } from 'pinia'
import axios from "axios";
import { space } from 'postcss/lib/list';

export const cartStore = defineStore('cartStore', {
  state: () => ({
   cartItems:[],

  }),
actions:{
    addItem(item){
        let exists = false;
        for (let i = 0; i < this.cartItems.length; i++) {
            if (this.cartItems[i].id === item.id) {
                this.cartItems[i].quantity += item.quantity
                exists=true;
                break;
            }            
        }
        if (!exists) {
        this.cartItems.push(JSON.parse(JSON.stringify(item)));
        }
        localStorage.setItem('cart-item', JSON.stringify(this.cartItems));
        console.log(this.cartItems);
    },
    gitCartItems(){
        if (localStorage.getItem('cart-item')) {
            this.cartItems =localStorage.parse(localStorage.getItem('cart-item'));
        }
        console.log(this.cartItems);
    },
    deleteItem(id){
        for (let i = 0; i < this.cartItems.length; i++) {
            if (this.cartItems[i].id === id) {
              this.cartItems.splice(i, 1);
              break;
            } 
        }
        localStorage.setItem('cart-item', JSON.stringify(this.cartItems));

    }
},


  });
