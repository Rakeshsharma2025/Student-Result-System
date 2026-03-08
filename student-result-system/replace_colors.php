<?php
$dir = new RecursiveDirectoryIterator('.');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/.*\.php$/', RegexIterator::GET_MATCH);

$replacements = [
    'bg-blue-900' => 'bg-slate-900',
    'text-blue-900' => 'text-slate-900',
    'border-blue-900' => 'border-slate-900',
    'focus:ring-blue-900' => 'focus:ring-slate-900',
    'hover:text-blue-900' => 'hover:text-slate-900',
    'hover:bg-blue-800' => 'hover:bg-slate-800',
    'bg-blue-800' => 'bg-slate-800',
    'text-blue-800' => 'text-slate-800',
    'bg-blue-950' => 'bg-slate-950',
    
    'bg-amber-500' => 'bg-emerald-500',
    'text-amber-500' => 'text-emerald-500',
    'border-amber-500' => 'border-emerald-500',
    'hover:bg-amber-400' => 'hover:bg-emerald-400',
    'hover:bg-amber-500' => 'hover:bg-emerald-500',
    'text-amber-400' => 'text-emerald-400',
    'hover:text-amber-500' => 'hover:text-emerald-500',
    'text-amber-600' => 'text-emerald-600',
    'bg-amber-200' => 'bg-emerald-200',
    'focus:ring-amber-500' => 'focus:ring-emerald-500',

    'bg-blue-600' => 'bg-emerald-600',
    'text-blue-600' => 'text-emerald-600',
    'border-blue-600' => 'border-emerald-600',
    'hover:bg-blue-700' => 'hover:bg-emerald-700',
    'hover:text-blue-700' => 'hover:text-emerald-700',
    'focus:ring-blue-500' => 'focus:ring-emerald-500',
    'text-blue-500' => 'text-emerald-500',
    
    'bg-blue-100' => 'bg-slate-100',
    'text-blue-100' => 'text-slate-100',
    'bg-blue-50' => 'bg-slate-50',
    'border-blue-200' => 'border-slate-200',
    'text-blue-200' => 'text-slate-400',
    'text-blue-700' => 'text-slate-700',
    'border-blue-400' => 'border-slate-400',
];

foreach($files as $file) {
    if (strpos($file[0], 'replace_colors.php') !== false) { continue; }
    
    $content = file_get_contents($file[0]);
    $newContent = strtr($content, $replacements);
    if ($content !== $newContent) {
        file_put_contents($file[0], $newContent);
        echo "Updated " . $file[0] . "\n";
    }
}
?>
