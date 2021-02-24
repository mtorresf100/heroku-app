@extends('layouts/contentLayoutMaster')

@section('title', 'Inicio')

@section('content')
@if(isset($mails))
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Estado de correos</h4>
        </div>
        <div class="card-body">
            <div class="card-text">
                <h5>Filtrar por: <a href="{{ route('log') }}" target="_self">Todos ({{ $count['total'] }})</a> - <a href="{{ route('log', ['filter' => 'not_send']) }}" target="_self">No enviados ({{ $count['not_sent'] }})</a> - <a href="{{ route('log', ['filter' => 'send']) }}" target="_self">Enviados ({{ $count['sent'] }})</a></h5>
            </div>
            <div class="card-text mb-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>To</th>
                            <th>CC</th>
                            <th>Subject</th>
                            <th>Attachment</th>
                            <th>Body</th>
                            <th>Status</th>
                            <th>Response</th>
                            <th>Resend</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mails as $row)
                            <tr>
                                <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                    {{ isset($row['to']) ? $row['to'] : '' }}
                                </td>
                                <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                    {{ isset($row['cc']) ? $row['cc'] : '' }}
                                </td>
                                <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                    {{ isset($row['subject']) ? $row['subject'] : '' }}
                                </td>
                                <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                    <a href="{{ isset($row['attachment']) ? $row['attachment'] : 'javascript:;' }}">Download</a>
                                </td>
                                <td style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                    <a target="_blank" href="{{ route('mail', ['mail' => isset($row['id']) ? $row['id'] : '' ]) }}">View</a>
                                </td>
                                <td align="center" style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; text-align: center;">
                                    <span class="badge badge-pill badge-light-{{ isset($row['status']) && $row['status'] == '202' ? 'success' : 'danger'  }} mr-1">
                                        {{ isset($row['status']) && $row['status'] == '202' ? 'Sent' : 'Failed' }}
                                    </span>
                                </td>
                                <td style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                    {{ isset($row['response']) ? $row['response'] : '' }}
                                </td>
                                <td style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                    <a target="_self" href="{{ isset($row['status']) && $row['status'] != '202' ? route('resend', ['mail' => isset($row['id']) ? $row['id'] : '']) : 'javascript:;' }}">Resend</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-text">
                {{ $mails->links() }}
            </div>
        </div>
    </div>
@endif
@endsection
