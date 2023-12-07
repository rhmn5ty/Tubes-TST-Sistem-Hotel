<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace RectorPrefix202310\Symfony\Component\Console\Style;

use RectorPrefix202310\Symfony\Component\Console\Exception\InvalidArgumentException;
use RectorPrefix202310\Symfony\Component\Console\Exception\RuntimeException;
use RectorPrefix202310\Symfony\Component\Console\Formatter\OutputFormatter;
use RectorPrefix202310\Symfony\Component\Console\Helper\Helper;
use RectorPrefix202310\Symfony\Component\Console\Helper\OutputWrapper;
use RectorPrefix202310\Symfony\Component\Console\Helper\ProgressBar;
use RectorPrefix202310\Symfony\Component\Console\Helper\SymfonyQuestionHelper;
use RectorPrefix202310\Symfony\Component\Console\Helper\Table;
use RectorPrefix202310\Symfony\Component\Console\Helper\TableCell;
use RectorPrefix202310\Symfony\Component\Console\Helper\TableSeparator;
use RectorPrefix202310\Symfony\Component\Console\Input\InputInterface;
use RectorPrefix202310\Symfony\Component\Console\Output\ConsoleOutputInterface;
use RectorPrefix202310\Symfony\Component\Console\Output\ConsoleSectionOutput;
use RectorPrefix202310\Symfony\Component\Console\Output\OutputInterface;
use RectorPrefix202310\Symfony\Component\Console\Output\TrimmedBufferOutput;
use RectorPrefix202310\Symfony\Component\Console\Question\ChoiceQuestion;
use RectorPrefix202310\Symfony\Component\Console\Question\ConfirmationQuestion;
use RectorPrefix202310\Symfony\Component\Console\Question\Question;
use RectorPrefix202310\Symfony\Component\Console\Terminal;
/**
 * Output decorator helpers for the Symfony Style Guide.
 *
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class SymfonyStyle extends OutputStyle
{
    public const MAX_LINE_LENGTH = 120;
    /**
     * @var \Symfony\Component\Console\Input\InputInterface
     */
    private $input;
    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    private $output;
    /**
     * @var \Symfony\Component\Console\Helper\SymfonyQuestionHelper
     */
    private $questionHelper;
    /**
     * @var \Symfony\Component\Console\Helper\ProgressBar
     */
    private $progressBar;
    /**
     * @var int
     */
    private $lineLength;
    /**
     * @var \Symfony\Component\Console\Output\TrimmedBufferOutput
     */
    private $bufferedOutput;
    public function __construct(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->bufferedOutput = new TrimmedBufferOutput(\DIRECTORY_SEPARATOR === '\\' ? 4 : 2, $output->getVerbosity(), \false, clone $output->getFormatter());
        // Windows cmd wraps lines as soon as the terminal width is reached, whether there are following chars or not.
        $width = (new Terminal())->getWidth() ?: self::MAX_LINE_LENGTH;
        $this->lineLength = \min($width - (int) (\DIRECTORY_SEPARATOR === '\\'), self::MAX_LINE_LENGTH);
        parent::__construct($this->output = $output);
    }
    /**
     * Formats a message as a block of text.
     *
     * @return void
     * @param string|mixed[] $messages
     */
    public function block($messages, string $type = null, string $style = null, string $prefix = ' ', bool $padding = \false, bool $escape = \true)
    {
        $messages = \is_array($messages) ? \array_values($messages) : [$messages];
        $this->autoPrependBlock();
        $this->writeln($this->createBlock($messages, $type, $style, $prefix, $padding, $escape));
        $this->newLine();
    }
    /**
     * @return void
     */
    public function title(string $message)
    {
        $this->autoPrependBlock();
        $this->writeln([\sprintf('<comment>%s</>', OutputFormatter::escapeTrailingBackslash($message)), \sprintf('<comment>%s</>', \str_repeat('=', Helper::width(Helper::removeDecoration($this->getFormatter(), $message))))]);
        $this->newLine();
    }
    /**
     * @return void
     */
    public function section(string $message)
    {
        $this->autoPrependBlock();
        $this->writeln([\sprintf('<comment>%s</>', OutputFormatter::escapeTrailingBackslash($message)), \sprintf('<comment>%s</>', \str_repeat('-', Helper::width(Helper::removeDecoration($this->getFormatter(), $message))))]);
        $this->newLine();
    }
    /**
     * @return void
     */
    public function listing(array $elements)
    {
        $this->autoPrependText();
        $elements = \array_map(function ($element) {
            return \sprintf(' * %s', $element);
        }, $elements);
        $this->writeln($elements);
        $this->newLine();
    }
    /**
     * @return void
     * @param string|mixed[] $message
     */
    public function text($message)
    {
        $this->autoPrependText();
        $messages = \is_array($message) ? \array_values($message) : [$message];
        foreach ($messages as $message) {
            $this->writeln(\sprintf(' %s', $message));
        }
    }
    /**
     * Formats a command comment.
     *
     * @return void
     * @param string|mixed[] $message
     */
    public function comment($message)
    {
        $this->block($message, null, null, '<fg=default;bg=default> // </>', \false, \false);
    }
    /**
     * @return void
     * @param string|mixed[] $message
     */
    public function success($message)
    {
        $this->block($message, 'OK', 'fg=black;bg=green', ' ', \true);
    }
    /**
     * @return void
     * @param string|mixed[] $message
     */
    public function error($message)
    {
        $this->block($message, 'ERROR', 'fg=white;bg=red', ' ', \true);
    }
    /**
     * @return void
     * @param string|mixed[] $message
     */
    public function warning($message)
    {
        $this->block($message, 'WARNING', 'fg=black;bg=yellow', ' ', \true);
    }
    /**
     * @return void
     * @param string|mixed[] $message
     */
    public function note($message)
    {
        $this->block($message, 'NOTE', 'fg=yellow', ' ! ');
    }
    /**
     * Formats an info message.
     *
     * @return void
     * @param string|mixed[] $message
     */
    public function info($message)
    {
        $this->block($message, 'INFO', 'fg=green', ' ', \true);
    }
    /**
     * @return void
     * @param string|mixed[] $message
     */
    public function caution($message)
    {
        $this->block($message, 'CAUTION', 'fg=white;bg=red', ' ! ', \true);
    }
    /**
     * @return void
     */
    public function table(array $headers, array $rows)
    {
        $this->createTable()->setHeaders($headers)->setRows($rows)->render();
        $this->newLine();
    }
    /**
     * Formats a horizontal table.
     *
     * @return void
     */
    public function horizontalTable(array $headers, array $rows)
    {
        $this->createTable()->setHorizontal(\true)->setHeaders($headers)->setRows($rows)->render();
        $this->newLine();
    }
    /**
     * Formats a list of key/value horizontally.
     *
     * Each row can be one of:
     * * 'A title'
     * * ['key' => 'value']
     * * new TableSeparator()
     *
     * @return void
     * @param string|mixed[]|\Symfony\Component\Console\Helper\TableSeparator ...$list
     */
    public function definitionList(...$list)
    {
        $headers = [];
        $row = [];
        foreach ($list as $value) {
            if ($value instanceof TableSeparator) {
                $headers[] = $value;
                $row[] = $value;
                continue;
            }
            if (\is_string($value)) {
                $headers[] = new TableCell($value, ['colspan' => 2]);
                $row[] = null;
                continue;
            }
            if (!\is_array($value)) {
                throw new InvalidArgumentException('Value should be an array, string, or an instance of TableSeparator.');
            }
            $headers[] = \key($value);
            $row[] = \current($value);
        }
        $this->horizontalTable($headers, [$row]);
    }
    /**
     * @return mixed
     */
    public function ask(string $question, string $default = null, callable $validator = null)
    {
        $question = new Question($question, $default);
        $question->setValidator($validator);
        return $this->askQuestion($question);
    }
    /**
     * @return mixed
     */
    public function askHidden(string $question, callable $validator = null)
    {
        $question = new Question($question);
        $question->setHidden(\true);
        $question->setValidator($validator);
        return $this->askQuestion($question);
    }
    public function confirm(string $question, bool $default = \true) : bool
    {
        return $this->askQuestion(new ConfirmationQuestion($question, $default));
    }
    /**
     * @param mixed $default
     * @return mixed
     */
    public function choice(string $question, array $choices, $default = null, bool $multiSelect = \false)
    {
        if (null !== $default) {
            $values = \array_flip($choices);
            $default = $values[$default] ?? $default;
        }
        $questionChoice = new ChoiceQuestion($question, $choices, $default);
        $questionChoice->setMultiselect($multiSelect);
        return $this->askQuestion($questionChoice);
    }
    /**
     * @return void
     */
    public function progressStart(int $max = 0)
    {
        $this->progressBar = $this->createProgressBar($max);
        $this->progressBar->start();
    }
    /**
     * @return void
     */
    public function progressAdvance(int $step = 1)
    {
        $this->getProgressBar()->advance($step);
    }
    /**
     * @return void
     */
    public function progressFinish()
    {
        $this->getProgressBar()->finish();
        $this->newLine(2);
        unset($this->progressBar);
    }
    public function createProgressBar(int $max = 0) : ProgressBar
    {
        $progressBar = parent::createProgressBar($max);
        if ('\\' !== \DIRECTORY_SEPARATOR || 'Hyper' === \getenv('TERM_PROGRAM')) {
            $progressBar->setEmptyBarCharacter('░');
            // light shade character \u2591
            $progressBar->setProgressCharacter('');
            $progressBar->setBarCharacter('▓');
            // dark shade character \u2593
        }
        return $progressBar;
    }
    /**
     * @see ProgressBar::iterate()
     */
    public function progressIterate(iterable $iterable, int $max = null) : iterable
    {
        yield from $this->createProgressBar()->iterate($iterable, $max);
        $this->newLine(2);
    }
    /**
     * @return mixed
     */
    public function askQuestion(Question $question)
    {
        if ($this->input->isInteractive()) {
            $this->autoPrependBlock();
        }
        $this->questionHelper = $this->questionHelper ?? new SymfonyQuestionHelper();
        $answer = $this->questionHelper->ask($this->input, $this, $question);
        if ($this->input->isInteractive()) {
            if ($this->output instanceof ConsoleSectionOutput) {
                // add the new line of the `return` to submit the input to ConsoleSectionOutput, because ConsoleSectionOutput is holding all it's lines.
                // this is relevant when a `ConsoleSectionOutput::clear` is called.
                $this->output->addNewLineOfInputSubmit();
            }
            $this->newLine();
            $this->bufferedOutput->write("\n");
        }
        return $answer;
    }
    /**
     * @return void
     * @param string|iterable $messages
     */
    public function writeln($messages, int $type = self::OUTPUT_NORMAL)
    {
        if (!\is_iterable($messages)) {
            $messages = [$messages];
        }
        foreach ($messages as $message) {
            parent::writeln($message, $type);
            $this->writeBuffer($message, \true, $type);
        }
    }
    /**
     * @return void
     * @param string|iterable $messages
     */
    public function write($messages, bool $newline = \false, int $type = self::OUTPUT_NORMAL)
    {
        if (!\is_iterable($messages)) {
            $messages = [$messages];
        }
        foreach ($messages as $message) {
            parent::write($message, $newline, $type);
            $this->writeBuffer($message, $newline, $type);
        }
    }
    /**
     * @return void
     */
    public function newLine(int $count = 1)
    {
        parent::newLine($count);
        $this->bufferedOutput->write(\str_repeat("\n", $count));
    }
    /**
     * Returns a new instance which makes use of stderr if available.
     */
    public function getErrorStyle() : self
    {
        return new self($this->input, $this->getErrorOutput());
    }
    public function createTable() : Table
    {
        $output = $this->output instanceof ConsoleOutputInterface ? $this->output->section() : $this->output;
        $style = clone Table::getStyleDefinition('symfony-style-guide');
        $style->setCellHeaderFormat('<info>%s</info>');
        return (new Table($output))->setStyle($style);
    }
    private function getProgressBar() : ProgressBar
    {
        if (!isset($this->progressBar)) {
            throw new RuntimeException('The ProgressBar is not started.');
        }
        return $this->progressBar;
    }
    private function autoPrependBlock() : void
    {
        $chars = \substr(\str_replace(\PHP_EOL, "\n", $this->bufferedOutput->fetch()), -2);
        if (!isset($chars[0])) {
            $this->newLine();
            // empty history, so we should start with a new line.
            return;
        }
        // Prepend new line for each non LF chars (This means no blank line was output before)
        $this->newLine(2 - \substr_count($chars, "\n"));
    }
    private function autoPrependText() : void
    {
        $fetched = $this->bufferedOutput->fetch();
        // Prepend new line if last char isn't EOL:
        if ($fetched && \substr_compare($fetched, "\n", -\strlen("\n")) !== 0) {
            $this->newLine();
        }
    }
    private function writeBuffer(string $message, bool $newLine, int $type) : void
    {
        // We need to know if the last chars are PHP_EOL
        $this->bufferedOutput->write($message, $newLine, $type);
    }
    private function createBlock(iterable $messages, string $type = null, string $style = null, string $prefix = ' ', bool $padding = \false, bool $escape = \false) : array
    {
        $indentLength = 0;
        $prefixLength = Helper::width(Helper::removeDecoration($this->getFormatter(), $prefix));
        $lines = [];
        if (null !== $type) {
            $type = \sprintf('[%s] ', $type);
            $indentLength = Helper::width($type);
            $lineIndentation = \str_repeat(' ', $indentLength);
        }
        // wrap and add newlines for each element
        $outputWrapper = new OutputWrapper();
        foreach ($messages as $key => $message) {
            if ($escape) {
                $message = OutputFormatter::escape($message);
            }
            $lines = \array_merge($lines, \explode(\PHP_EOL, $outputWrapper->wrap($message, $this->lineLength - $prefixLength - $indentLength, \PHP_EOL)));
            if (\count($messages) > 1 && $key < \count($messages) - 1) {
                $lines[] = '';
            }
        }
        $firstLineIndex = 0;
        if ($padding && $this->isDecorated()) {
            $firstLineIndex = 1;
            \array_unshift($lines, '');
            $lines[] = '';
        }
        foreach ($lines as $i => &$line) {
            if (null !== $type) {
                $line = $firstLineIndex === $i ? $type . $line : $lineIndentation . $line;
            }
            $line = $prefix . $line;
            $line .= \str_repeat(' ', \max($this->lineLength - Helper::width(Helper::removeDecoration($this->getFormatter(), $line)), 0));
            if ($style) {
                $line = \sprintf('<%s>%s</>', $style, $line);
            }
        }
        return $lines;
    }
}
