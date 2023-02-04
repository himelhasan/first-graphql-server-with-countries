const { UserList, MovieList } = require("../FakeData");
const _ = require("lodash");

const resolvers = {
  Query: {
    // USER RESOLVERS for all the users
    users: () => {
      return UserList;
    },
    // single user using argument
    user: (parent, args) => {
      const id = args.id;
      const user = _.find(UserList, { id: Number(id) });
      return user;
    },
    // Movie resolvers for all the movies
    movies: () => {
      return MovieList;
    },

    // single Movie resolvers for all the movies
    movie: (parent, args) => {
      const name = args.name;
      const movie = _.find(MovieList, { name: name });
      return movie;
    },
  },
};

module.exports = { resolvers };
