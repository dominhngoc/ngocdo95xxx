@extends('frontend.manager')
@section('box')
    <div class="address-box">
        <div class="account-header">
            <h5>Thông tin tài khoản</h5>
        </div>
        <div class="account-main">
            <form action="#">
                @foreach($user as $us)
                    <table>
                        <tr>
                            <td>Họ tên</td>
                            <td><input class="account-input" type="text" value={{$us->infor->name}}></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td><input class="account-input" type="text" value={{$us->infor->phoneNumber}}></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input class="account-input" type="text" value={{$us->infor->email}}></td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td><input @if( $us->infor->gender=='man')
                                       checked
                                       @endif
                                       type="radio" name="gender" value="man" >Nam<br>
                                <input @if( $us->infor->gender=='woman')
                                       checked
                                       @endif
                                       type="radio" name="gender" value="woman">Nữ<br></td>
                        </tr>
                        <tr>
                            <td>Ngày sinh</td>
                            <td><select name="day">
                                    <option value="1">1</option>
                                    <option value="2">2</option>

                                    <option value="3">3</option>
                                </select>
                                <select name="month" >
                                    <option value="1">1</option>
                                    <option value="2">2</option>

                                    <option value="3">3</option>
                                </select>
                                <select name="yeare" form="carform">
                                    <option value="1995">1995</option>
                                    <option value="1996">1996</option>

                                    <option value="1997">1997</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button id="account-update">Cập nhật</button></td>
                        </tr>
                    </table>
                @endforeach
            </form>
        </div>
    </div>
@stop