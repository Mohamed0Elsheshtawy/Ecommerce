import { defineStore } from 'pinia'
import axios from "axios";

export const productsModule = defineStore('productsModule', {
  state: () => ({
   flashDeals:[],
   NewProduct:[],
   MobilePhones:[],
   ProductCategory:[],
   singlProduct:[],
   categories:[
    {
      title:'Labtops',
      route:'laptops'
    },
    {
      title:'TVS',
      route:'TVS'
    },
    {
      title:'mobile phones',
      route:'phone'
    },
    {
      title:'Cameras',
      route:'Cameras'
    },
    {
      title:'Gaming',
      route:'Gaming'
    }
    
   ]
  }),
actions:{
    async getProducts() {
        try {
            const response = await axios.get('http://localhost:8000/api/products')
            .then((response) =>{
              this.flashDeals = response.data.data.slice(0, 8);
              this.NewProduct = response.data.data.filter(
              (el) => el.category === "laptops"
            )
            this.MobilePhones = response.data.data.filter(
              (el) => el.category === "phone"
            )

            }
            )
            
        } catch (error) {
            console.error('Error fetching products:', error);
        }
    },
    async getSinglProducts(productId) {
      try {
          const response = await axios.get(`http://localhost:8000/api/products/${productId}`)
          .then((response) =>{
          this.singlProduct = response.data.data
          console.log(this.singlProduct,"nnnnnnnnnnnnnnn");
             
          })
      
                  
      } catch (error) {
          console.error('Error fetching products:', error);
      }
    },
    async getProductsCategory(categoryName) {
      try {
          const response = await axios.get('http://localhost:8000/api/products')
          .then((response) =>{
          this.ProductCategory = response.data.data.filter(
            (el) => el.category === `${categoryName}`
          )
         
          })
                  
      } catch (error) {
          console.error('Error fetching products:', error);
      }
  }
},


  });
