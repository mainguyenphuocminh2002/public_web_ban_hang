$(document).ready(function () {
    // $('#categoryAdd').click(function () {
    //     var linkUrl = $(this).data("url");
    //     var targetId = $(this).data("target");
    //     $.ajax({
    //         url: linkUrl,
    //     }).done(function (res) {
    //         // console.log(res)

    //         $('#' + targetId).append(res);
    //     });
    // })
    var i = 0;
    $('#categoryProductAdd').click(function () {
        var linkUrl = $(this).data("url");
        var targetId = $(this).data("target");
        if (i === 0) {
            $.ajax({
                url: linkUrl,
            }).done(function (res) {
                i++;
                $('#' + targetId).append(res);
            });
        } else {
            return false;
        }
    })

    // Loại Chung Loại Chi Tiết

    $('#AddLoaiChung').click(function () {
        var htmlBox = `
            <div id="boxLoaiChung" class="form-group d-flex justify-content-between">
                <input type="text" class="form-control" required id="inputAddCategoryChung" />
                <button type="button" id="btnCategoryChung" style="margin-left:10px;" class="btn btn-success">Thêm</button>
                <button type="button" id="btnCategoryChungDelete" style="margin-left:10px;" class="btn btn-danger">Huỷ</button>
            </div>
        `
        $('#boxAddCategoryChung').html(htmlBox);
        var linkUrl = $(this).data("url");
        $('#btnCategoryChungDelete').click(function () {
            $('#boxLoaiChung').remove();
        })
        $('#btnCategoryChung').click(function () {
            var data = $('#inputAddCategoryChung').val();
            if (data) {
                $.ajax({
                    url: linkUrl,
                    data: { data: data },
                    type: "post"
                }).done(function (res) {
                    htmlBox = '';
                    $('#boxAddCategoryChung').html(htmlBox);
                })
            } else {
                return false;
            }
        })
    })

    $('#categoryAdd').click(function () {
        var linkUrl = $(this).data("url");
        $.ajax({
            url: linkUrl
        }).done(function (res) {
            $('#boxAddCategoryChiTiet').html(res);
        })


    })
    $('#AddToping').click(function () {
        var htmlBox = `
            <div id="boxToping" class="form-group d-flex justify-content-between">
                <input type="text" class="form-control" required id="inputAddToping" />
                <button type="button" id="btnToping" style="margin-left:10px;" class="btn btn-success">Thêm</button>
                <button type="button" id="btnTopingDelete" style="margin-left:10px;" class="btn btn-danger">Huỷ</button>
            </div>
        `
        $('#boxAddToping').html(htmlBox);
        var linkUrl = $(this).data("url");
        var targetId = $(this).data("target");
        $('#btnTopingDelete').click(function () {
            $('#boxToping').remove();
        })
        $('#btnToping').click(function () {
            var data = $('#inputAddToping').val();
            if (data) {
                $.ajax({
                    url: linkUrl,
                    data: { data: data },
                    type: "post"
                }).done(function (res) {
                    htmlBox = '';
                    $('#boxAddToping').html(htmlBox);
                    $('#' + targetId).append(res);
                })
            } else {
                return false;
            }
        })
    })

    $('.btnDeleteToping').click(function () {
        var keyDelete = $(this).data('delete');
        var linkUrl = $(this).data('url');
        $.ajax({
            url: linkUrl,
            data: { id: keyDelete },
            type: "POST"
        }).done(function () {
            $('.TopingData').each(function (key, item) {
                if (item.dataset.delete == keyDelete) {
                    item.remove();
                }
            })
        })
    })



    $('#trangthaiAdd').click(function () {
        var linkUrl = $(this).data("url");
        var targetId = $(this).data("target");
        $.ajax({
            url: linkUrl,
        }).done(function (res) {
            $('#' + targetId).append(res);
        });
    })
    $('#AddTrangThaiChung').click(function () {
        var htmlBox = `
            <div id="trangThaiChungBox"  class="form-group d-flex justify-content-between">
                <input type="text" class="form-control" required id="inputAddTrangThaiChung" />
                <button type="button" id="btnTrangThaiChung" style="margin-left:10px;" class="btn btn-success">Thêm</button>
                <button type="button" id="btnTrangThaiChungHuy" style="margin-left:10px;" class="btn btn-danger">Huỷ</button>
            </div>
        `
        $('#boxAddTrangThaiChung').html(htmlBox);
        var linkUrl = $(this).data("url");
        $('#btnTrangThaiChung').click(function () {
            var data = $('#inputAddTrangThaiChung').val();
            if (data) {
                $.ajax({
                    url: linkUrl,
                    data: { data: data },
                    type: "post"
                }).done(function (res) {
                    htmlBox = '';
                    $('#boxAddTrangThaiChung').html(htmlBox);
                })
            } else {
                return false;
            }
        })
        $('#btnTrangThaiChungHuy').click(function () {
            $('#trangThaiChungBox').remove();
        })
    })
    // ProductDetail

    // Xoa chưa đổi
    $('.btnProductDetailDelete').click(function (event) {
        var keybtn = $(this).data('id');
        var linkUrl = $(this).data("url");
        $.ajax({
            url: linkUrl,
            data: { id: keybtn },
            type: "post"
        })
        $('.productDetailDelete').each(function (key, item) {
            if (keybtn == item.dataset.id) {
                item.remove();
            }
        })
    })



    // Xoá Trạng Thái Ajax Input


    $('.btnDeleteTrangThai').click(function (event) {
        var btnKeyDelete = $(this).data('delete');
        var linkUrl = $(this).data('url');
        $.ajax({
            url: linkUrl,
            data: { id: btnKeyDelete },
            type: "POST"
        }).done(function () {

        })
        var trangthaikey = '';
        $('.trangThaiData').each(function (item, key) {
            trangthaikey = key.dataset.delete;
            if (trangthaikey === btnKeyDelete) {
                key.remove();
            }
        })
    })

    $('.btnStatus').click(function (event) {
        var StatusKey = $(this).data('id');
        // id của trạng thái
        var dhId = $(this).data('dhid');
        // truyền vào để check giống khác
        $('.statusName').each(function (key, item) {
            if (dhId == item.dataset.dhid) {
                $.ajax({
                    url: "https://localhost/Molicha/Cart/api/UpdateTrangThai",
                    data: {
                        statuskey: StatusKey,
                        dhId: dhId
                    },
                    type: "POST"
                }).done(function (res) {
                    item.innerText = res;
                })
            }
        })
        // $(this).each(function(key,item){
        //     item.dataset.id
        // })
    })

    $('.editor').each(function () {
        var id = $(this).attr("id")
        CKEDITOR.replace(id, {
            uiColor: '#14B8C4'
        });
    })
    $('.editorContent').each(function () {
        var id = $(this).attr("id")
        CKEDITOR.replace(id, {
            uiColor: '#14B8C4'
        });
    })
})

function BrowseServer(idInput, thumbnail) {
    let files = document.getElementById(idInput).files;
    const allowtypes = ['image/jpg', 'image/png', 'image/jpeg'];
    const maxfilesize = 4194304;
    if (!allowtypes.includes(files[0].type)) {
        return;
    }
    if (maxfilesize < files[0].size) {
        return;
    }
    var fd = new FormData();
    fd.append('image', files[0]);
    $.ajax({
        type: "POST",
        url: "/api/handleImage",
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response);
            // document.getElementById(idInput).value = response;
            console.log(document.getElementById(idInput).value)
            document.getElementById(thumbnail).src = response;
            // console.log(document.getElementById(thumbnail));
        }
    });
}


