const Index = function () {
    let comicsRequest = () => {
        let url = '/comics/api'

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
            message: 'Fazendo a listagem de comics!'
        })

        request('GET', url, null)
            .then(function (response) {
                if (response.data.status === "Ok" && response.data.data.results.length > 0) {
                    setTimeout($.unblockUI, 2000)

                    response.data.data.results.map(item => {
                        let description = item.description !== null ? `<p class="card-text">${item.description}</p>` : ``;

                        $('.row.comics').append(`
                            <div class="col">
                                <div class="card mt-2" style="width: 25rem;">
                                    <img src="${item.thumbnail.path}.${item.thumbnail.extension}" class="card-img-top" alt="${item.title}" title="${item.title}">
                                    <div class="card-body">
                                        <h5 class="card-title">${item.title}</h5>
                                        ${description}
                                        <a href="${url}/${item.id}/details" class="btn btn-primary">Details</a>
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
                    swal('Atenção', 'Houve um erro ao listar os comics', 'error')
                }
            })
    }

    return {
        init: function () {
            comicsRequest()
        }
    }
}()

$(document).ready(function () {
    Index.init()
})
