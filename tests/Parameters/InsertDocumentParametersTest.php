<?php

declare(strict_types=1);

/*
 * BigBlueButton open source conferencing system - https://www.bigbluebutton.org/.
 *
 * Copyright (c) 2016-2024 BigBlueButton Inc. and by respective authors (see below).
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU Lesser General Public License as published by the Free Software
 * Foundation; either version 3.0 of the License, or (at your option) any later
 * version.
 *
 * BigBlueButton is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
 * PARTICULAR PURPOSE. See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with BigBlueButton; if not, see <https://www.gnu.org/licenses/>.
 */

namespace BigBlueButton\Parameters;

use BigBlueButton\TestCase;

/**
 * @internal
 */
final class InsertDocumentParametersTest extends TestCase
{
    public function testInsertDocumentParameters(): void
    {
        $meetingId = $this->faker->uuid;
        $params    = new InsertDocumentParameters($meetingId);

        $params->addPresentation('https://demo.bigbluebutton.org/biglbuebutton.png');
        $params->addPresentation('https://demo.bigbluebutton.org/biglbuebutton.pdf');
        $params->addPresentation('https://demo.bigbluebutton.org/biglbuebutton.svg');

        $this->assertEquals($meetingId, $params->getMeetingID());

        $this->assertXmlStringEqualsXmlFile(dirname(__DIR__) . \DIRECTORY_SEPARATOR . 'fixtures' . \DIRECTORY_SEPARATOR . 'insert_document_presentations.xml', $params->getPresentationsAsXML());
    }
}
