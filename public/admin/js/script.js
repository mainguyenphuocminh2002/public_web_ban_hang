/*
Author       : Dreamguys
Template Name: Kanakku - Bootstrap Admin Template
Version      : 1.0
*/

(function ($) {
  "use strict";

  // Variables declarations

  var $wrapper = $(".main-wrapper");
  var $pageWrapper = $(".page-wrapper");
  var $slimScrolls = $(".slimscroll");

  // Sidebar
  var Sidemenu = function () {
    this.$menuItem = $("#sidebar-menu a");
  };

  function init() {
    var $this = Sidemenu;
    $("#sidebar-menu a").on("click", function (e) {
      if ($(this).parent().hasClass("submenu")) {
        e.preventDefault();
      }
      if (!$(this).hasClass("subdrop")) {
        $("ul", $(this).parents("ul:first")).slideUp(350);
        $("a", $(this).parents("ul:first")).removeClass("subdrop");
        $(this).next("ul").slideDown(350);
        $(this).addClass("subdrop");
      } else if ($(this).hasClass("subdrop")) {
        $(this).removeClass("subdrop");
        $(this).next("ul").slideUp(350);
      }
    });
    $("#sidebar-menu ul li.submenu a.active")
      .parents("li:last")
      .children("a:first")
      .addClass("active")
      .trigger("click");
  }

  // Sidebar Initiate
  init();

  // Mobile menu sidebar overlay
  $("body").append('<div class="sidebar-overlay"></div>');
  $(document).on("click", "#mobile_btn", function () {
    $wrapper.toggleClass("slide-nav");
    $(".sidebar-overlay").toggleClass("opened");
    $("html").addClass("menu-opened");
    return false;
  });

  // Sidebar overlay
  $(".sidebar-overlay").on("click", function () {
    $wrapper.removeClass("slide-nav");
    $(".sidebar-overlay").removeClass("opened");
    $("html").removeClass("menu-opened");
  });

  // Page Content Height
  if ($(".page-wrapper").length > 0) {
    var height = $(window).height();
    $(".page-wrapper").css("min-height", height);
  }

  // Page Content Height Resize
  $(window).resize(function () {
    if ($(".page-wrapper").length > 0) {
      var height = $(window).height();
      $(".page-wrapper").css("min-height", height);
    }
  });

  // Select 2
  if ($(".select").length > 0) {
    $(".select").select2({
      minimumResultsForSearch: -1,
      width: "100%",
    });
  }

  // Datetimepicker

  if ($(".datetimepicker").length > 0) {
    $(".datetimepicker").datetimepicker({
      format: "YYYY-MM-DD",
      icons: {
        up: "fas fa-angle-up",
        down: "fas fa-angle-down",
        next: "fas fa-angle-right",
        previous: "fas fa-angle-left",
      },
    });
  }

  // Tooltip
  if ($('[data-toggle="tooltip"]').length > 0) {
    $('[data-toggle="tooltip"]').tooltip();
  }


  // Sidebar Slimscroll
  if ($slimScrolls.length > 0) {
    $slimScrolls.slimScroll({
      height: "auto",
      width: "100%",
      position: "right",
      size: "7px",
      color: "#ccc",
      allowPageScroll: false,
      wheelStep: 10,
      touchScrollStep: 100,
    });
    var wHeight = $(window).height() - 60;
    $slimScrolls.height(wHeight);
    $(".sidebar .slimScrollDiv").height(wHeight);
    $(window).resize(function () {
      var rHeight = $(window).height() - 60;
      $slimScrolls.height(rHeight);
      $(".sidebar .slimScrollDiv").height(rHeight);
    });
  }

  // Password Show

  if ($(".toggle-password").length > 0) {
    $(document).on("click", ".toggle-password", function () {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $(".pass-input");
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  }

  // Check all email

  $(document).on("click", "#check_all", function () {
    $(".checkmail").click();
    return false;
  });
  if ($(".checkmail").length > 0) {
    $(".checkmail").each(function () {
      $(this).on("click", function () {
        if ($(this).closest("tr").hasClass("checked")) {
          $(this).closest("tr").removeClass("checked");
        } else {
          $(this).closest("tr").addClass("checked");
        }
      });
    });
  }

  // Mail important

  $(document).on("click", ".mail-important", function () {
    $(this).find("i.fa").toggleClass("fa-star").toggleClass("fa-star-o");
  });

  // Small Sidebar
  $(document).on("click", "#toggle_btn", function () {
    if ($("body").hasClass("mini-sidebar")) {
      $("body").removeClass("mini-sidebar");
      $(".subdrop + ul").slideDown();
    } else {
      $("body").addClass("mini-sidebar");
      $(".subdrop + ul").slideUp();
    }
    setTimeout(function () {
      mA.redraw();
      mL.redraw();
    }, 300);
    return false;
  });

  $(document).on("mouseover", function (e) {
    e.stopPropagation();
    if ($("body").hasClass("mini-sidebar") && $("#toggle_btn").is(":visible")) {
      var targ = $(e.target).closest(".sidebar").length;
      if (targ) {
        $("body").addClass("expand-menu");
        $(".subdrop + ul").slideDown();
      } else {
        $("body").removeClass("expand-menu");
        $(".subdrop + ul").slideUp();
      }
      return false;
    }
  });

  $(document).on("click", "#filter_search", function () {
    $("#filter_inputs").slideToggle("slow");
  });

  // Chat

  var chatAppTarget = $(".chat-window");
  (function () {
    if ($(window).width() > 991) chatAppTarget.removeClass("chat-slide");

    $(document).on(
      "click",
      ".chat-window .chat-users-list a.media",
      function () {
        if ($(window).width() <= 991) {
          chatAppTarget.addClass("chat-slide");
        }
        return false;
      }
    );
    $(document).on("click", "#back_user_list", function () {
      if ($(window).width() <= 991) {
        chatAppTarget.removeClass("chat-slide");
      }
      return false;
    });
  })();
})(jQuery);
// Quill

var toolbarOptions = [
  [{ header: [1, 2, 3, 4, 5, 6, false] }],
  ["bold", "italic", "underline"],
  [{ indent: "-1" }, { indent: "+1" }],
  [{ color: [] }, { background: [] }],
  [{ align: [] }],
  ["link"],
];
if ($("#content").length > 0) {
  var content = new Quill("#content", {
    modules: {
      toolbar: toolbarOptions,
    },
    theme: "snow",
  });
}
if ($("#summary").length > 0) {
  var summary = new Quill("#summary", {
    modules: {
      toolbar: toolbarOptions,
    },
    theme: "snow",
  });
}
// dsd
if ($(".select2tag").length > 0) {
  $(".select2tag").select2({
    tags: true,
    width: "100%",
  });
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#thumbnailPreview").css(
        "background-image",
        "url(" + e.target.result + ")"
      );
      $("#thumbnailPreview").hide();
      $("#thumbnailPreview").fadeIn(650);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$("#thumbnail").change(function () {
  readURL(this);
});

// $("#create_product").submit(function (e) {
//   e.preventDefault();
//   $(this)
//     .find("[type=submit]")
//     .prepend(
//       '<span class="spinner-border spinner-border-sm mr-2" role="status"></span>'
//     );
//   var formData = new FormData(this);
//   let content = $("#content .ql-editor");
//   let summary = $("#summary .ql-editor");
//   formData.append("action", "create_product");
//   formData.append("content", content.html());
//   formData.append("summary", summary.html());
//   $.ajax({
//     url: "./ajax.php",
//     type: "POST",
//     data: formData,
//     dataType: "JSON",
//     success: function (data) {
//       $(".spinner-border").remove();
//       Swal.fire({
//         title: "Đăng thành công",
//         html: `Bạn vừa đăng thành công sản phẩm <b>${data[1]}</b>`,
//         icon: "success",
//         showCancelButton: true,
//         confirmButtonColor: "#d33",
//         cancelButtonColor: "#3085d6",
//         confirmButtonText: "Xem chi tiết sản phẩm",
//         cancelButtonText: "Đăng sản phẩm khác",
//       }).then((result) => {
//         if (result.isConfirmed) {
//           location.href = "../?action=san-pham&id=" + data[0];
//         } else {
//           document.getElementById("create_product").reset();
//           $(".select2-selection__choice").remove();
//           summary.html("");
//           content.html("");
//         }
//       });
//     },
//     cache: false,
//     contentType: false,
//     processData: false,
//   });
// });

// $("#edit_product").submit(function (e) {
//   e.preventDefault();
//   $(this)
//     .find("[type=submit]")
//     .prepend(
//       '<span class="spinner-border spinner-border-sm mr-2" role="status"></span>'
//     );
//   $(this).data("id");
//   var formData = new FormData(this);
//   let content = $("#content .ql-editor");
//   let summary = $("#summary .ql-editor");
//   formData.append("action", "edit_product");
//   formData.append("id", $(this).data("id"));
//   formData.append("content", content.html());
//   formData.append("summary", summary.html());
//   $.ajax({
//     url: "./ajax.php",
//     type: "POST",
//     data: formData,
//     dataType: "JSON",
//     success: function (data) {
//       $(".spinner-border").remove();
//       Swal.fire({
//         title: "Cập nhật thành công",
//         html: `Bạn vừa cập nhật thành công sản phẩm <b>${data[1]}</b>`,
//         icon: "success",
//         showCancelButton: true,
//         confirmButtonColor: "#d33",
//         cancelButtonColor: "#3085d6",
//         confirmButtonText: "Xem chi tiết sản phẩm",
//         cancelButtonText: "Tiếp tục cập nhật",
//       }).then((result) => {
//         if (result.isConfirmed) {
//           location.href = "../?action=san-pham&id=" + data[0];
//         }
//       });
//     },
//     cache: false,
//     contentType: false,
//     processData: false,
//   });
// });
function deleteItem(element, action, item) {
  let id = element.closest("tr").find(".id").text();
  let title = element.closest("tr").find(".title").text();
  title = title ? title : "#" + id;
  var dtRow = element.parents("tr");
  Swal.fire({
    title: `Xóa ${item}`,
    html: `Bạn có muốn xoá ${item} <b>${title}</b>`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Xóa",
    cancelButtonText: "Không",
    showLoaderOnConfirm: true,
    preConfirm: () => {
      return fetch(ADMIN_URL + action + "/" + id)
        .then((response) => response.json())
        .catch((error) => {
          Swal.showValidationMessage(`${item} Khóa ngoại`);
        });
      return $.ajax({
        type: "POST",
        url: ADMIN_URL + action,
        data: postForm,
        dataType: "JSON",
        success: (data) => data,
      });
    },
    allowOutsideClick: () => !Swal.isLoading(),
  }).then((result) => {
    if (result.isConfirmed) {
      console.log(result.value);
      if (result.value == 1) {
        var table = $(".datatable").DataTable();
        table.row(dtRow).remove().draw(false);
        Swal.fire({
          title: "Xóa thành công",
          text: `Bạn đã xoá ${item} '${title}'`,
          icon: "success",
        });
      } else {
        Swal.fire({
          title: "Xóa không thành công",
          text: `Đã có lỗi khi xoá ${item} '${title}'`,
          icon: "error",
        });
      }
    }
  });
}

$("#DataTables_Table_0").on("click", ".status", function (e) {
  $this = $(this);
  let idOrder = $(this).closest("tr").find(".id").text();
  let idStatus = $(this).data("id");
  let textStatus = $(this).text();
  let badge = $(this).closest("tr").find(".badge");
  var postForm = {
    idOrder,
    idStatus,
  };
  Swal.fire({
    title: "Thay đổi trạng thái",
    html: `Bạn muốn thay đổi trạng thái sang <b>${textStatus}</b>`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Có",
    cancelButtonText: "Không",
    showLoaderOnConfirm: true,
    preConfirm: () => {
      return $.ajax({
        type: "POST",
        url: ADMIN_URL + "/order/StatusChange",
        data: postForm,
        dataType: "TEXT",
        success: (data) => data,
      });
    },
    allowOutsideClick: () => !Swal.isLoading(),
  }).then((result) => {
    console.log(result);
    if (result.isConfirmed) {
      if (result.value == "true") {
        badge.text(textStatus);
        badge.removeClass();
        badge.addClass(`badge bg-status-${idStatus}`);
        Swal.fire({
          title: "Thay đổi thành công",
          html: `Trạng thái hiện tại là <b>${textStatus}</b>`,
          icon: "success",
        });
      } else {
        Swal.fire({
          title: "Thay đổi không trạng thái thành công",
          text: `Đã có lỗi khi thay đổi trạng thái đơn hàng '${idOrder}'`,
          icon: "error",
        });
      }
    }
  });
});
function GetQLeditor() {
  let content = $("#content .ql-editor");
  let summary = $("#summary .ql-editor");
  if (content.length > 0) $("#content ~ input").val(content.html());
  if (summary.length > 0) $("#summary ~ input").val(summary.html());
}
$("#create_category").submit(GetQLeditor);
$("#edit_category").submit(GetQLeditor);
$("#create_tag").submit(GetQLeditor);
$("#edit_tag").submit(GetQLeditor);
$("#create_tag").submit(GetQLeditor);
$("#create_product").submit(GetQLeditor);
$("#edit_product").submit(GetQLeditor);
$("#create_coupon").submit(GetQLeditor);
$("#edit_coupon").submit(GetQLeditor);
$("#create_author").submit(GetQLeditor);
$("#edit_author").submit(GetQLeditor);
$("#product_list").on("click", ".delete", function (e) {
  return deleteItem($(this), "/product/delete", "sản phẩm");
});
$("#category_list").on("click", ".delete", function (e) {
  return deleteItem($(this), "/category/delete", "danh mục");
});
$("#user_list").on("click", ".delete", function (e) {
  return deleteItem($(this), "/user/delete", "thành viên");
});
$("#tag_list").on("click", ".delete", function (e) {
  return deleteItem($(this), "/tag/delete", "từ khóa");
});
$("#reviews_list").on("click", ".delete", function (e) {
  return deleteItem($(this), "/review/delete", "Đánh giá");
});
$("#coupon_list").on("click", ".delete", function (e) {
  return deleteItem($(this), "/coupon/delete", "Coupon");
});
$("#author_list").on("click", ".delete", function (e) {
  return deleteItem($(this), "/author/delete", "Tác giả");
});
$("#reviews_list").on("click", ".accept", function (e) {
  e.preventDefault();
  console.log(e);
  let badge = $(this).closest("tr").find(".badge");
  let idReview = $(this).closest("tr").find(".id").text();
  var postForm = {
    idReview,
  };
  Swal.fire({
    title: "Phê duyệt đánh giá sản phẩm",
    html: `Bạn muốn phê duyệt đánh giá <b>#${idReview}</b>`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Có",
    cancelButtonText: "Không",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: ADMIN_URL + "/review/approve",
        data: postForm,
        dataType: "JSON",
        success: function (x) {
          badge.text("Đã duyệt");
          badge.removeClass();
          badge.addClass("badge badge-pill bg-success-light");
          $(e.target).remove();
          Swal.fire({
            title: "Thành công",
            html: `Đánh giá <b>#${idReview}</b> đã được phê duyệt`,
            icon: "success",
          });
        },
      });
    }
  });
});
window.setTimeout(function () {
  $(".alert.alert-success")
    .fadeTo(500, 0)
    .slideUp(500, function () {
      $(this).remove();
    });
}, 3000);
function generateCoupon() {
  let coupon = voucher_codes.generate({
    length: 6,
    charset: "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ",
  });
  $("#code").val(coupon[0]);
}

$("#order_list").on("click", ".transport", function (e) {
  return GHTK($(this), "/transport/createShipmentOrder");
});

function GHTK(element, action) {
  let id = element.closest("tr").find(".id").text();
  Swal.fire({
    title: `Đăng đơn hàng`,
    html: `Đơn hàng <b>${id}</b> của bạn đã được gửi lên hệ thống GHTK`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Xóa",
    cancelButtonText: "Không",
    showLoaderOnConfirm: true,
    preConfirm: () => {
      return $.ajax({
        url: ADMIN_URL + action + "/" + id,
        dataType: "JSON",
        success: (data) => {
          console.log(data);
          if (!data["success"]) {
            Swal.showValidationMessage(`${data["message"]}`);
          } else {
            return data;
          }
        },
      });
    },
    allowOutsideClick: () => !Swal.isLoading(),
  }).then((result) => {
    if (result.isConfirmed) {
      if (result.value["success"] == true) {
        Swal.fire({
          title: "Thành công",
          html: `Đơn hàng ${id} của bạn đã được gửi lên hệ thống GHTK`,
          icon: "success",
        });
      }
    }
  });
}

$("#order_list").on("click", ".quick-view", function (e) {
  return orderQuickView($(this), "/order/OrderQuickView");
});

function orderQuickView(element, action) {
  let id = element.closest("tr").find(".id").text();
  $.ajax({
    url: ADMIN_URL + action + "/" + id,
    dataType: "HTML",
    success: (data) => {
      $("#quickview .modal-body").html(data);
      $("#quickview").modal("show");
    },
  });
}
