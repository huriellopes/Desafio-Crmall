const Show = function () {
    let showComics = () => {
        let url = `/comics/api/${id}/show`

        $.blockUI({
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#ffffff'
            },
            message: 'Buscando detalhe do comic!'
        })

        request('GET', url, null)
            .then(response => {
                if (response.data.status === "Ok" && response.data.data.results.length > 0) {
                    setTimeout($.unblockUI, 2000)

                    response.data.data.results.map(item => {
                        let description = item.description !== null ? `<p class="card-text">${item.description}</p>` : ``
                        let price = formatPrice(item.prices.map(prices => prices.price))

                        $('.row.comics-show').append(`
                            <div class="col mb-3">
                                <div class="card">
                                    <div class="card-header text-center">${item.title}</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="${item.thumbnail.path}.${item.thumbnail.extension}" class="card-img-top" alt="${item.title}" title="${item.title}" />
                                            </div>
                                            <div class="col-7">
                                                ${description}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title">
                                                   ${price}
                                                </h5>
                                            </div>
                                            <div class="col d-flex justify-content-end">
                                                <button onclick="${checkoutSale(item.title, price)}" class="btn btn-primary">Checkout</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `)
                    })
                }
            })
            .catch(err => {
                if (err.response.status === 400) {
                    setTimeout($.unblockUI, 2000)
                    swal('Atenção', error.response.data.message, 'error')
                } else {
                    setTimeout($.unblockUI, 2000)
                    swal('Atenção', 'Houve um erro ao mostrar o detalhe do comics', 'error')
                }
            })
    }

    let checkoutSale = (title, price) => {
        let url = '/checkouts/sale'

        const data = {
            'title': title,
            'price': price
        }

        // request('GET', url, data)
        //     .then(response => {
        //         window.location.href = '/checkouts/sale'
        //     })
        //     .catch(err => {
        //         if (err.response.status === 400) {
        //             setTimeout($.unblockUI, 2000)
        //             swal('Atenção', error.response.data.message, 'error')
        //         } else {
        //             setTimeout($.unblockUI, 2000)
        //             swal('Atenção', 'Houve um erro ao ir pro checkout.', 'error')
        //         }
        //     })
    }

    return {
        init: function () {
            showComics()
        }
    }
}()

$(document).ready(function () {
    Show.init()
})
