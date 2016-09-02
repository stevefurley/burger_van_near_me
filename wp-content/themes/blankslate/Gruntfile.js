module.exports = function(grunt) {

  grunt.initConfig({

    sass: {
      dev: {
        options: {
          style: 'expanded'
        },
        files: {
          'style.css': 'assets/sass/main.scss'
        }
      },
      build: {
        options: {
          style: 'compress'
        },
        files: {
          'style.css': 'assets/sass/main.scss'
        }
      }
    },

   
    connect: {
      build: {
        options: {
          hostname: '127.0.0.1',
          port: 8080,
          base: 'assets/',
          open: true,
          livereload: true
        }
      }
    },

    watch: {
      options: {
        livereload: true
      },
      build: {
        files: ['source/**/*'],
        tasks: ['copy', 'includereplace', 'sass']
      },
    }

  });

  grunt.loadNpmTasks('grunt-contrib-clean');        // https://github.com/gruntjs/grunt-contrib-clean

  grunt.loadNpmTasks('grunt-contrib-copy');         // https://github.com/gruntjs/grunt-contrib-copy
  grunt.loadNpmTasks('grunt-contrib-concat');       // https://github.com/gruntjs/grunt-contrib-concat
  grunt.loadNpmTasks('grunt-contrib-sass');         // https://github.com/gruntjs/grunt-contrib-sass
  grunt.loadNpmTasks('grunt-include-replace');      // https://github.com/alanshaw/grunt-include-replace
  grunt.loadNpmTasks('grunt-contrib-uglify');       // https://github.com/gruntjs/grunt-contrib-uglify

  grunt.loadNpmTasks('grunt-contrib-connect');      // https://github.com/gruntjs/grunt-contrib-connect
  grunt.loadNpmTasks('grunt-contrib-watch');        // https://github.com/gruntjs/grunt-contrib-watch


  grunt.registerTask('build', ['clean', 'copy', 'includereplace', 'sass:build', 'uglify']);

  grunt.registerTask('dev', ['clean', 'copy', 'includereplace', 'sass:dev', 'uglify', 'connect', 'watch']);


};