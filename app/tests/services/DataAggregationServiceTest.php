<?php

use Fintrack\Storage\Services\DataAggregationService;
use Beans\SummaryBean;

class DataAggregationServiceTest extends TestCase {
    public function setUp() {
        parent::setUp();

        $this->service = new DataAggregationService();
    }

    public function testTotal() {
        $beans[] = new SummaryBean(1, 10);
        $beans[] = new SummaryBean(2, 20);
        $beans[] = new SummaryBean(1, 30);

        $summary = $this->service->total($beans);
        $this->assertNotNull($summary);
        $this->assertTrue($summary instanceof SummaryBean);
        $this->assertEquals(4, $summary->count);
        $this->assertEquals(60, $summary->amount);
        $this->assertNull($summary->group);
    }

    public function testJoinSummary() {
        $summaries = $this->service->joinSummary(array(), array());
        $this->assertNotNull($summaries);
        $this->assertEquals(0, count($summaries));
    }
}