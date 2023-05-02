<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$rules = [
    '@PSR2' => true,
    'array_syntax' => ['syntax' => 'short'],
    'blank_line_after_namespace' => true,
    'blank_line_before_statement' => [
        'statements' => ['return']
    ],
    'cast_spaces' => true,
    'concat_space' => [
        'spacing' => 'one'
    ],
    'fully_qualified_strict_types' => true,
    'function_declaration' => true,
    'function_typehint_space' => true,
    'heredoc_to_nowdoc' => true,
    'include' => true,
    'increment_style' => ['style' => 'post'],
    'linebreak_after_opening_tag' => true,
    'line_ending' => true,
    'lowercase_keywords' => true,
    'magic_method_casing' => true,
    'magic_constant_casing' => true,
    'multiline_whitespace_before_semicolons' => [
        'strategy' => 'no_multi_line'
    ],
    'native_function_casing' => true,
    'no_alias_functions' => true,
    'no_extra_blank_lines' => [
        'tokens' => [
            'extra',
            'throw',
            'use'
        ]
    ],
    'no_blank_lines_after_phpdoc' => true,
    'no_empty_phpdoc' => true,
    'no_empty_statement' => true,
    'no_leading_namespace_whitespace' => true,
    'no_mixed_echo_print' => [
        'use' => 'echo'
    ],
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_short_bool_cast' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'no_spaces_around_offset' => true,
    'no_trailing_comma_in_singleline_array' => true,
    'no_unneeded_control_parentheses' => true,
    'no_unreachable_default_argument_value' => true,
    'no_useless_return' => true,
    'no_whitespace_before_comma_in_array' => true,
    'normalize_index_brace' => true,
    'not_operator_with_successor_space' => false,
    'object_operator_without_whitespace' => true,
    'phpdoc_indent' => true,
    'general_phpdoc_tag_rename' => true,
    'phpdoc_inline_tag_normalizer' => true,
    'phpdoc_tag_type' => true,
    'phpdoc_no_access' => true,
    'phpdoc_no_package' => true,
    'phpdoc_no_useless_inheritdoc' => true,
    'phpdoc_scalar' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_summary' => true,
    'phpdoc_to_comment' => true,
    'phpdoc_trim' => true,
    'phpdoc_types' => true,
    'phpdoc_var_without_name' => true,
    'php_unit_dedicate_assert' => true,
    'php_unit_dedicate_assert_internal_type' => true,
    'php_unit_expectation' => true,
    'php_unit_internal_class' => true,
    'php_unit_mock' => true,
    'php_unit_namespaced' => true,
    'php_unit_no_expectation_annotation' => true,
    'psr_autoloading' => true,
    'self_accessor' => true,
    'single_space_after_construct' => true,
    'simplified_null_return' => false,
    'single_line_comment_style' => [
        'comment_types' => ['hash']
    ],
    'single_quote' => true,
    'space_after_semicolon' => true,
    'standardize_not_equals' => true,
    'trailing_comma_in_multiline' => true,
    'trim_array_spaces' => true,
    'unary_operator_spaces' => true,
    'whitespace_after_comma_in_array' => true,
    'no_unused_imports' => true,
];


$finder = Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ . '/resources',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new Config();
return $config->setFinder($finder)
    ->setRules($rules)
    ->setRiskyAllowed(true)
    ->setUsingCache(true);
