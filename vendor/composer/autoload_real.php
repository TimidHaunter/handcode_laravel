<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit8c7ea4259ee803cc81251aeb0aba983f
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        // string(29) "Composer\Autoload\ClassLoader"
//        var_dump($class);
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        // 判断私有属性$loader是否赋值，第一次为null，进不来
        if (null !== self::$loader) {
            return self::$loader;
        }

        /**
         * 1.将 ComposerAutoloaderInit8c7ea4259ee803cc81251aeb0aba983f 类中的方法 loadClassLoader 添加到 __autoload 函数队列的首位。
         *   并激活，如果设置不成功则抛出异常，常见的异常是PHP编译的时候出现的 LogicException
         *
         * LogicException 继承于 Exception，如果PHP在编译的时候发生异常，就会抛出
         *
         * 2.获取 loader，引入 vendor/composer/ClassLoader.php，并实例化 ClassLoader
         *
         * 3.将 loadClassLoader 函数从 __autoload 队列删除
         */
        try {
            spl_autoload_register(array('ComposerAutoloaderInit8c7ea4259ee803cc81251aeb0aba983f', 'loadClassLoader'), true, true);
        } catch (\Exception $exception){
            var_dump($exception);
        }

        // 实例化 \Composer\Autoload\ClassLoader()，当前页面并没有这个方法，所以去执行 loadClassLoader()
        // 实例化一个未定义的类时（因为没有加载 \Composer\Autoload\ClassLoader类），就会触发此函数 spl_autoload_register
        // 会将 \Composer\Autoload\ClassLoader 的命名空间和类名都传递过去
        // 实例化成功后，把实例绑定到私有属性上
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
//        var_dump(self::$loader);

        spl_autoload_unregister(array('ComposerAutoloaderInit8c7ea4259ee803cc81251aeb0aba983f', 'loadClassLoader'));

        /**
         * 判断一系列的环境，PHP版本大于5.6，是否使用HHVM虚拟机，文件是否被加密
         *
         * PHP_VERSION_ID PHP版本号，该常量是在PHP内核中定义，具体位置在 main/php_version.h，这里的判断是PHP版本大于5.6
         *
         * HHVM_VERSION HHVM，是Facebook开发的高性能PHP虚拟机，据说比官方的快，使用.hh作为文件的后缀
         *
         * zend_loader_file_encoded 判断文件是否使用Zend Guard编码进行加密的，Zend Guard是一个编码器，可以防止源码泄露
         */
        var_dump(PHP_VERSION_ID);
        $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded());
        var_dump($useStaticLoader);

        if ($useStaticLoader) {
            // 加载静态绑定类和路径映射关系，就是 composer.json 文件中 autoload 参数，composer autoload-dump 后的文件
            require __DIR__ . '/autoload_static.php';

            // 执行 getInitializer 方法
            call_user_func(\Composer\Autoload\ComposerStaticInit8c7ea4259ee803cc81251aeb0aba983f::getInitializer($loader));
        } else {
            $map = require __DIR__ . '/autoload_namespaces.php';
            foreach ($map as $namespace => $path) {
                $loader->set($namespace, $path);
            }

            $map = require __DIR__ . '/autoload_psr4.php';
            foreach ($map as $namespace => $path) {
                $loader->setPsr4($namespace, $path);
            }

            $classMap = require __DIR__ . '/autoload_classmap.php';
            if ($classMap) {
                $loader->addClassMap($classMap);
            }
        }

        $loader->register(true);

        if ($useStaticLoader) {
            $includeFiles = Composer\Autoload\ComposerStaticInit8c7ea4259ee803cc81251aeb0aba983f::$files;
        } else {
            $includeFiles = require __DIR__ . '/autoload_files.php';
        }
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire8c7ea4259ee803cc81251aeb0aba983f($fileIdentifier, $file);
        }

        return $loader;
    }
}

function composerRequire8c7ea4259ee803cc81251aeb0aba983f($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        require $file;

        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;
    }
}
