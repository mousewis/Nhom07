function type_0() {
    $("input[name='nd_hoten']").removeAttr('hidden');
    $("input[name='nd_dchi']").removeAttr('hidden');
    $("input[name='nd_sdt']").removeAttr('hidden');
    $("input[name='hd_nguoinhan']").removeAttr('required');
    $("input[name='hd_dchi']").removeAttr('required');
    $("input[name='hd_sdt']").removeAttr('required');
    $("input[name='hd_nguoinhan']").attr('hidden', 'hidden');
    $("input[name='hd_dchi']").attr('hidden', 'hidden');
    $("input[name='hd_sdt']").attr('hidden', 'hidden');
}
function type_1() {
    $("input[name='hd_nguoinhan']").removeAttr('hidden');
    $("input[name='hd_dchi']").removeAttr('hidden');
    $("input[name='hd_sdt']").removeAttr('hidden');
    $("input[name='hd_nguoinhan']").attr('required', 'required');
    $("input[name='hd_dchi']").attr('required', 'required');
    $("input[name='hd_sdt']").attr('required', 'required');
    $("input[name='nd_hoten']").attr('hidden', 'hidden');
    $("input[name='nd_dchi']").attr('hidden', 'hidden');
    $("input[name='nd_sdt']").attr('hidden', 'hidden');
}