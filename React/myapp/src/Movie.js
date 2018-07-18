import React , { Component } from 'react';
import PropTypes from 'prop-types'; 
import './Movie.css';
// class Movie extends Component{
//
//     static propTypes = {
//         title : PropTypes.string.isRequired,
//         poster : PropTypes.string.isRequired
//     }
//
//     render(){
//         return (
//
//             <div>
//                 <MoviePoster poster={this.props.poster} />
//                 <h1>{this.props.title}</h1>
//             </div>
//
//         )
//     }
// }
function Movie({title , poster , genres , synopsis}) {
    return (
        <div className="Movie-Card">
            <div className="Movie_Col">
                <MoviePoster poster={poster} alt={title} title={title}/>
            </div>
            <div className="Movie_Col">
                <h1>{title}</h1>
                <div className="Movie_Genres">
                    {genres.map((genre,index) => {
                        return <MovieGenre genre={genre} key={index}/>
                    })}
                </div>

            </div>

                <p className="Movie_Synopsis">
                    {synopsis}
                </p>

        </div>
    )
}

// title={movie_data.title_english}
// poster={movie_data.medium_cover_image}
// key={movie_data.id}
// genres={movie_data.genres}
// synopsis={movie_data.synopsis}

Movie.PropTypes = {
    title : PropTypes.string.isRequired,
    poster : PropTypes.string.isRequired,
    genres : PropTypes.array.isRequired,
    synopsis : PropTypes.string.isRequired
};

// class MoviePoster extends Component{
//
//     static propTypes = {
//         poster : PropTypes.string.isRequired
//     }
//
//     render(){
//         return (
//             <img src={this.props.poster} alt="Movie-Poster" />
//         )
//     }
// }
function MoviePoster({poster , alt , title}) {
    return <img src={poster} alt={alt} title={title} className="Movie_Poster"/>
}
MoviePoster.PropTypes = {
    poster : PropTypes.string.isRequired,
    alt : PropTypes.string.isRequired,
    title : PropTypes.string.isRequired
};

function MovieGenre({genre}) {
    return (
        <span className="Movie_Genres">{genre}</span>
    )
}

MovieGenre.PropTypes = {
    genre : PropTypes.string.isRequired
};
export default Movie;
