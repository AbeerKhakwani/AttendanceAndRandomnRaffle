--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: attendees; Type: TABLE; Schema: public; Owner: AbeerK; Tablespace: 
--

CREATE TABLE attendees (
    id integer NOT NULL,
    fname character varying(50),
    lname character varying(50),
    email character varying(50),
    amount double precision,
    type integer,
    here integer DEFAULT 0,
    rafflewon integer DEFAULT 0
);


ALTER TABLE attendees OWNER TO "AbeerK";

--
-- Name: attendees_id_seq; Type: SEQUENCE; Schema: public; Owner: AbeerK
--

CREATE SEQUENCE attendees_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE attendees_id_seq OWNER TO "AbeerK";

--
-- Name: attendees_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: AbeerK
--

ALTER SEQUENCE attendees_id_seq OWNED BY attendees.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: AbeerK; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    username character varying,
    password character varying,
    vegie integer,
    admin integer
);


ALTER TABLE users OWNER TO "AbeerK";

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: AbeerK
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO "AbeerK";

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: AbeerK
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: AbeerK
--

ALTER TABLE ONLY attendees ALTER COLUMN id SET DEFAULT nextval('attendees_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: AbeerK
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: attendees; Type: TABLE DATA; Schema: public; Owner: AbeerK
--

COPY attendees (id, fname, lname, email, amount, type, here, rafflewon) FROM stdin;
40	Nawaal	khakwani	thekfamily10@gmail.com	8989	1	1	0
36	hafsa	aden	thewaywellok@gmail.com	27	1	1	1
35	Abeer	Khakwani	abeerkhakwani@gmail.com	34	0	1	1
37	ava	jean	avathejean@gmail.com	35	1	1	1
39	Name	Edited	thhh@gmail.com	67	0	1	1
38	No freaking way	yeah	noemail@gmail.com	67	0	1	1
\.


--
-- Name: attendees_id_seq; Type: SEQUENCE SET; Schema: public; Owner: AbeerK
--

SELECT pg_catalog.setval('attendees_id_seq', 40, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: AbeerK
--

COPY users (id, username, password, vegie, admin) FROM stdin;
40	admin	admin	1	1
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: AbeerK
--

SELECT pg_catalog.setval('users_id_seq', 40, true);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: AbeerK; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: AbeerK
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM "AbeerK";
GRANT ALL ON SCHEMA public TO "AbeerK";
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

