<div>
    <div class="table-responsive">
        <table class="table table-sm">
            <tbody>
                @foreach($rows as $i => $row)
                    <tr>
                        @foreach($row as $j => $data)
                            <td>
                                @if($j == 0)
                                    @if(isset($data['name']))
                                    <b>
                                        {{ $data['name'] }}
                                    </b>
                                    @endif
                                @else
                                    @if($i == 0)
                                        <small>
                                            <b>{{ $data }}</b>
                                        </small>
                                    @else
                                        @if(isset($data['strong']) && $data['strong'] == true)
                                            <strong>
                                                {{ $data['total'] }}
                                        @else
                                            {{ $data }}
                                        @endif
                                    @endif
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <caption>
        <span class="badge bg-danger">
            Pendiente de validar el cálculo
        </span>
    </caption>
</div>
