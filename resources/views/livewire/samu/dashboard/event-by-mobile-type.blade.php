<div>
    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <tbody>
                @foreach($rows as $i => $row)
                    <tr>
                        @foreach($row as $j => $data)
                            <td>
                                @if($j == 0)
                                    <b>
                                        {{ $data['id'] }}
                                    </b>
                                @else
                                    @if($i == 0)
                                        <small>
                                            <b>{{ $data }}</b>
                                        </small>
                                    @else
                                        {{ $data }}
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