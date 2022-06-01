function requestRefund($this) {
  $order_id = $($this).attr("data-id");
  console.log($order_id);

  $.ajax({
    type: "post",
    url: "../../ApplicationLayer/ManageRefundInterface/refundList.php",
    data: {
      isRefund: 1,
      order_id: $order_id,
    },
  });
}
