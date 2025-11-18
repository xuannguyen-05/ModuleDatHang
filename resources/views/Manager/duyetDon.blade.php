@extends('Manager.layout')
@section('title','Duyệt đơn')
@section('content')
    <h2 style="color: #2C3E50;">Quản lý Đơn hàng</h2>
    <p>Tổng cộng có {{ $orders->total() }} đơn hàng.</p>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID Đơn</th>
                    <th>Ngày Đặt</th>
                    <th>Tên Khách Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái Hiện Tại</th>
                    <th>Cập Nhật Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                        <td>{{ number_format($order->totalamount) }}đ</td>
                        <td>
                            @if($order->status == 0)
                                <span class="badge bg-warning text-dark">Chờ xử lý</span>
                            @elseif($order->status == 1)
                                <span class="badge bg-info text-dark">Đang chuẩn bị hàng</span>
                            @elseif($order->status == 2)
                                <span class="badge bg-primary">Đang giao hàng</span> 
                            @else
                                <span class="badge bg-success">Hoàn thành</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('manager.orders.updateStatus', $order->order_id) }}" method="POST" class="d-flex">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm me-2">
                                    <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Chờ xử lý</option>
                                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đang chủng bị hàng</option>
                                    <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đang giao hàng</option>
                                    <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Hoàn thành</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm btnSave">Lưu</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Không có đơn hàng nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $orders->links() }}
    </div>

@endsection