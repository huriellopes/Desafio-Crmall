const CheckoutIndex = function () {
    let initPlugin = () => {
        initTable()
    }

    let setDataTable = () => {
        let url = '/checkouts/api';

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
            message: 'Fazendo a listagem de checkouts!'
        })

        request('GET', url, null)
            .then(response => {
                let checkoutTable = $("#checkoutTable").DataTable()
                checkoutTable.clear()

                setTimeout($.unblockUI, 2000)

                if (response.status === 200 && response.data.length > 0) {
                    setTimeout($.unblockUI, 2000)

                    response.data.map(item => {
                        checkoutTable.row.add([
                            item.id, item.title, item.quantity, item.price, item.price_total, item.created_at, `<a href="#">View</a>`
                        ])
                    })
                }
                console.log(response)
            })
            .catch(err => {
                if (err.response.status === 400) {
                    setTimeout($.unblockUI, 2000)
                    swal('Atenção', error.response.data.message, 'error')
                } else {
                    setTimeout($.unblockUI, 2000)
                    swal('Atenção', 'Houve um erro ao listar os checkouts', 'error')
                }
            })
    }

    return {
        init: function () {
            initPlugin()
            setDataTable()
        }
    }
}()

$(document).ready(function () {
    CheckoutIndex.init()
})
