<div>
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
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
</div>
