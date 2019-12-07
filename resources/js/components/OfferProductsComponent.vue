<template>
    <div class="card-body">

        <div v-if="showModal" class="modal-mask">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        Добавить позицию
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="addProductSelect">Позиция</label>
                                <select class="form-control" id="addProductSelect" name="addProductSelect" v-model="productSelect">
                                    <option v-for="product in products" :value="product">{{ product.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="descriptionRussian">Описание RU</label>
                                <textarea readonly class="form-control" id="descriptionRussian" rows="4">{{ productSelect.descriptionRussian }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="descriptionEnglish">Описание EN</label>
                                <textarea readonly class="form-control" id="descriptionEnglish" rows="4">{{ productSelect.descriptionEnglish }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="showModal = false">Close</button>
                        <button class="btn btn-success float-right" @click="addProduct()">Добавить</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label ">Название (не выводится в КП)</label>
            <div class="col">
                <input id="name" class="form-control" v-model="offer.name">
            </div>
        </div>
        <hr />
        <div class="form-group row">
            <label for="language" class="col-md col-form-label ">Язык</label>
            <div class="col">
                <select class="form-control" id="language" name="language" v-model="offer.language">
                    <option value="0">русский</option>
                    <option value="1">английский</option>
                </select>
            </div>
            <label for="number" class="col-md col-form-label ">Номер</label>
            <div class="col">
                <input class="form-control" id="number" name="number" v-model="offer.number">
            </div>
        </div>
        <hr />
        <div class="form-group row">
            <div class="col">
                <h3>Позиции</h3>
            </div>
        </div>

        <div class="form-row border" v-for="(offerProduct, key) in offer.products" v-if="offerProduct.delete == 0">

            <div class="form-group col-md-1">
                <label for=""><h5>№ {{ key +1 }}</h5></label>
            </div>
            <div class="form-group col-md-5">
                <label for="">Описание</label>
                <div class="form-group">
                    <textarea class="form-control" id="description" rows="4" v-model="offerProduct.description"></textarea>
                </div>
            </div>
            <div class="form-group col-md">
                <label for="">Стоимость</label>
                <div class="form-group">
                    <input class="form-control" v-model="offerProduct.price">
                </div>
            </div>
            <div class="form-group col-md">
                <label for="">Количество</label>
                <div class="form-group">
                    <input class="form-control" v-model="offerProduct.quantity">
                </div>
            </div>
            <div class="form-group col-md">
                <label for="measure">Ед. измерения</label>
                <div class="form-group">
                    <select class="form-control" id="measure" name="measure" v-model="offerProduct.measure">
                        <option value="0">ШТ</option>
                        <option value="1">М2</option>
                        <option value="2">МП</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-md">
                <label for=""></label>
                <div class="form-group">
                    <button class="btn btn-danger" @click="offerProduct.delete = true">
                        УДАЛИТЬ
                    </button>
                </div>
            </div>
            <image-component-offer v-if="offerProduct.image!== undefined && offerProduct.image !== null" v-on:update:file="offerProduct.image = $event" :image_path="offerProduct.image"/>
            <image-component-offer v-else v-on:update:file="offerProduct.image = $event"/>
        </div>
        <div class="form-row">
            <div class="col">
                <button class="btn btn-success float-right" @click="showModal = true">Добавить позицию</button>
            </div>
        </div>

        <hr />
        <div class="form-group row">
            <div class="form-group col-md">
                <label for="sale" class="col-md col-form-label ">Скидка</label>
                <div class="col">
                    <input class="form-control" id="sale" name="sale" v-model="offer.sale">
                </div>
            </div>
            <div class="form-group col-md">
                <label for="productionTime" class="col-md col-form-label ">Срок изготовления (дней)</label>
                <div class="col">
                    <input
                        :class="'form-control' + (offer.productionTime == '' ? ' is-invalid' : '') "
                        id="productionTime"
                        name="productionTime"
                        v-model="offer.productionTime"
                    >
                </div>
            </div>
            <div class="form-group col-md">
                <label class="col-md col-form-label " for="employee">Сотрудник</label>
                <div class="col">
                    <select class="form-control" id="employee" name="employee" v-model="offer.employee">
                        <option v-for="employee in employees" :value="employee.id">{{ employee.name }}</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="form-group col-md">
                <label class="col-md col-form-label " for="termsOfPayment">Условия оплаты</label>
                <div class="col">
                    <select class="form-control" id="termsOfPayment" name="termsOfPayment" v-model="offer.termsOfPayment">
                        <option v-for="(terms_of_payment, key) in terms_of_payments" :value="terms_of_payment.id">{{terms_of_payment.nameRussian}}</option>
                    </select>
                </div>
            </div>
        </div>

        <hr />
        <div class="form-row">
            <div class="form-group col-md">
                <button class="btn btn-success float-right" @click="store()">Создать коммерческое предложение</button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            products: {}
            , terms_of_payments: {}
            , employees: {}
            , offer_prop: {}
        }
        ,data: function () {
            return {
                productSelect: []
                ,showModal: false
                , offer: {
                    name: ''
                    ,number: ''
                    ,productionTime: ''
                    ,language: 0
                    ,sale: 0
                    ,termsOfPayment: 0
                    ,employee: 0
                    ,products: []
                }

            }
        }
        ,mounted() {
            this.productSelect = this.products[0];
            this.offer.employee = this.employees[0].id;
            this.offer.termsOfPayment = this.terms_of_payments[0].id;

            if (this.offer_prop !== undefined)
                this.offer = this.offer_prop

        }
        ,methods: {
            addProduct: function () {
                let product ={};
                product.quantity = 1;
                product.measure = '0';
                product.delete = false;
                this.offer.language == 0 ? product.description = this.productSelect.descriptionRussian : product.description = this.productSelect.descriptionEnglish;
                this.offer.language == 0 ? product.price = this.productSelect.priceRub : product.price = this.productSelect.priceUsd;
                this.offer.products.push(product);
                this.showModal = false;
            }
            ,store: function () {
                let url, method;
                if (this.offer_prop === undefined) {
                    url = '/offers';
                    method = 'POST'
                } else {
                    url = '/offers/' + this.offer.id;
                    method = 'PUT'
                }

                axios({
                    url: url,
                    method: method,
                    data: {
                        'offer': this.offer
                    }
                }).then((response) =>{
                    this.offer.id = response.data.offerId;
                    axios({
                        url: '/offers/' + this.offer.id,
                        method: 'GET',
                        responseType: 'blob',
                    }).then((response) => {
                        var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                        var fileLink = document.createElement('a');

                        fileLink.href = fileURL;
                        fileLink.setAttribute('download','КП-' + this.offer.id + '.pdf');
                        document.body.appendChild(fileLink);

                        fileLink.click();

                        document.location.href = '/offers'
                    });

                }).catch(error => {

                });


            }

        }
    }
</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }
</style>
