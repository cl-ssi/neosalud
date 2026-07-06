<?php

namespace Tests\Unit;

use App\Exports\Chagas\SuspectCaseExport;
use Illuminate\Database\Eloquent\Builder;
use Mockery;
use PHPUnit\Framework\TestCase;

class SuspectCaseExportTest extends TestCase
{
    public function test_it_exposes_a_query_and_chunk_size_for_chunked_exports()
    {
        $query = Mockery::mock(Builder::class);
        $export = new SuspectCaseExport($query);

        $this->assertSame($query, $export->query());
        $this->assertSame(1000, $export->chunkSize());
        $this->assertSame(1000, $export->batchSize());
        $this->assertContains('Paciente', $export->headings());
    }
}
