<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace FondOfSpryker\Shared\Mail;

use Spryker\Shared\Mail\MailConstants as SprykerMailConstants;

interface MailConstants extends SprykerMailConstants
{
    public const MAIL_SENDER_NAME = 'MAIL_SENDER_NAME';
    public const MAIL_SENDER_EMAIL = 'MAIL_SENDER_EMAIL';

    public const MAILER_SMTP_HOST = 'MAILER_SMTP_HOST';
    public const MAILER_SMTP_PORT = 'MAILER_SMTP_PORT';
    public const MAILER_SMTP_USER = 'MAILER_SMTP_USER';
    public const MAILER_SMTP_PASSWORD = 'MAILER_SMTP_PASSWORD';
    public const MAILER_SMTP_ENCRYPTION = 'MAILER_SMTP_ENCRYPTION';
}
