@extends('layouts/contentLayoutMaster')

@section('title', 'Inicio')

@section('content')
<!-- Excel start -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Selecciona el archivo de Excel para enviar correos</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
      <form action="{{ route('excel') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="form-group">
              <label for="customFile">Archivo de Excel</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input @error('file-upload') is-invalid @enderror" name="file-upload"  accept=".xlsx,.xls" id="customFile">
                <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
                  @error('file-upload')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
            </div>
            <a href="{{ route('home')  }}" class="btn btn-outline-primary waves-effect waves-float waves-light" type="submit">Reiniciar</a>
            <button class="btn btn-primary waves-effect waves-float waves-light" type="submit">Enviar Masivo</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@if(isset($failures))
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-danger">Este archivo no se pudo importar porque presenta los siguientes errores:</h4>
        </div>
        <div class="card-body">
            <div class="card-text mb-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>Fila</th>
                            <th>Campo</th>
                            <th>Errores</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($failures as $failure)
                            <tr>
                                <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                    {{ $failure->row() }}
                                </td>
                                <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                    {{ $failure->attribute() }}
                                </td>
                                <td align="center" style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                    <ul>
                                        @foreach($failure->errors() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif
<!--/ Excel start -->
@if(isset($result))
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Se han importado ({{ $result['imported'] }}) dato(s) del archivo de Excel y se han creado ({{ $result['mails'] }}) correo(s)</h4>
        </div>
        <div class="card-body">
            @foreach($result['table'] as $key => $email)
                @foreach($email as $mail => $table)
                <div class="card-text mb-5">
                    <p class="font-medium-2">Manager: {{ $mail }}</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>AWB</th>
                                <th>Invoice</th>
                                <th>Invoice Age</th>
                                <th>F/D</th>
                                <th>Amount Due (USD)</th>
                                <th>Rebilling Account</th>
                                <th>Cash Date</th>
                                <th>Ship Date</th>
                                <th>Category</th>
                                <th>Comments</th>
                                <th>Woff Location</th>
                                <th>Legal Entity Code</th>
                                <th>Manager</th>
                                <th>Pup/Pod Agent</th>
                                <th>Agent</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($table as $row)
                                <tr>
                                    <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['airbill_number']) ? $row['airbill_number'] : '' }}
                                    </td>
                                    <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['invoice_number']) ? $row['invoice_number'] : '' }}
                                    </td>
                                    <td align="center" style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['invoice_age']) ? $row['invoice_age'] : '' }}
                                    </td>
                                    <td align="center" style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; text-align: center;">
                                        {{ isset($row['airbill_type']) ? $row['airbill_type'] : '' }}
                                    </td>
                                    <td align="center" style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; text-align: center;">
                                        ${{ isset($row['airbill_original_amount_usd']) ? $row['airbill_original_amount_usd'] : '' }}
                                    </td>
                                    <td style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['rebilling_account']) ? $row['rebilling_account'] : '' }}
                                    </td>
                                    <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['cash_date']) ? \Carbon\Carbon::parse($row['cash_date'])->format('Y-m-d') : '' }}
                                    </td>
                                    <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['ship_date']) ? \Carbon\Carbon::parse($row['ship_date'])->format('Y-m-d') : '' }}
                                    </td>
                                    <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['pending_category']) ? $row['pending_category'] : '' }}
                                    </td>
                                    <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['comments']) ? $row['comments'] : '' }}
                                    </td>
                                    <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['woff_location']) ? $row['woff_location'] : '' }}
                                    </td>
                                    <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['legal_entity_code']) ? $row['legal_entity_code'] : '' }}
                                    </td>
                                    <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['email_pup_pod_agent']) ? $row['email_pup_pod_agent'] : '' }}
                                    </td>
                                    <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['email_manager_collector']) ? $row['email_manager_collector'] : '' }}
                                    </td>
                                    <td align="center"  style="font-family: 'Montserrat',Arial,sans-serif; font-size: 14px; padding-top: 10px; padding-bottom: 10px;">
                                        {{ isset($row['agent']) ? $row['agent'] : '' }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr />
                @endforeach
            @endforeach
        </div>
    </div>
@endif
@endsection
